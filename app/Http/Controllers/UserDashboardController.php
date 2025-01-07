<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
     // for add user
     function addUser(Request $request)
     {
         $add = DB::table("users")->insertGetId([
             "name" => $request->name,
             "email" => $request->email,
             "sponcer_id" => $request->id,
             "position" => $request->position,
             "entry_fee" => $request->package,
             "password" => bcrypt($request->password), // Hash the password
         ]);
     
         if ($add) {
             $lastid = $add; // `insertGetId` se last inserted ID milti hai
             $selectlastuser = DB::table("users")->where("id", $lastid)->first();
             $mainspid = $selectlastuser->sponcer_id;
     
             $levels = DB::table("level")->get();
             foreach ($levels as $lv) {
 
                 if($lastid == $mainspid)
                 {
                     session()->flash("message", "Insert successfully...");
                     return view("dashboard"); // Redirect or show success message
                
                 }else{
                 // Insert commition
                 DB::table("commition")->insert([
                     "user_id" => $mainspid,
                     "amount" => $lv->amount, // Assuming `amount` is a column in `level` table
                 ]);
     
                 // Fetch sponsor's details
                 $selectspocslastid = DB::table("users")->where("id", $mainspid)->first();
                 $currentCommition = $selectspocslastid->commition ?? 0; // Handle null values
     
                 $commitonupdate = $lv->amount + $currentCommition;
                 DB::table("users")->where("id", $mainspid)->update([
                     "commition" => $commitonupdate,
                 ]);
     
                 $lastid = $mainspid;
                 $mainspid = $selectspocslastid->sponcer_id;
             }
         }
     
             session()->flash("message", "Insert successfully...");
             return view("dashboard"); // Redirect or show success message
         } else {
             session()->flash("message", "Something went wrong...");
             return view("dashboard");
         }
     }

    //  logout
     function userLogout()
     {
        auth()->logout();
        return redirect("/")->with("message","logout successfully..");
     }

    //  for view add user
    function viewaddUser()
    {
        $left = Db::table("users")->where("sponcer_id",auth()->user()->id)->get();
        $amount = Db::table("_commitions")->get();
        return view("adduser",["left"=>$left,'amount'=>$amount]);
    }

    //  view self commition

    function viewCommition()
    {
        $view = DB::table("commition")->where("user_id", auth()->user()->id)->orderby("id","desc")->get();
        return view("viewcom",["view"=>$view]);
    }

    // for admin view all commition
    function adminViewCommition()
    {
        $view = DB::table("commition")
            ->join("users", "commition.user_id", "=", "users.id")
            ->select("commition.*", "users.name as user_name")
            ->orderby("commition.id","desc")
            ->get();
    
        return view("admin.adminviewcomm", compact("view"));
    }

    // view left and right user from admin
    // function adminViewLeftAndRight()
    // {
    //     $view = DB::table("users")->where("");
    // }

// view user my

function viewMyUsers()
{
    $user = DB::table("users")->where("sponcer_id",auth()->user()->id)->get();
    foreach ($user as $us) {
        $user->total_user = DB::table('users')->where('sponcer_id', $us->id)->count();
    }
    return view("viewmyuser",["user"=>$user]);
}
    
}
