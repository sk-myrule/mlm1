<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    function dashboardPath()
    {
        return view("admin.dashboard");
    }

    // for view comm
    function viewAddCommition()
    {
        $view = DB::table('_commitions')->orderby("id","desc")->get();
        return view("admin.viewcommition",["view"=>$view]);
    }

    // add com
    function addSubmitCom(Request $request)
    {
        $add = DB::table('_commitions')->insert([
            "name"=>$request->name,
            "amount"=>$request->amount
        ]);
        if($add)
        {
            session()->flash("message","insert successfully...");
            return view("admin.addcommi");
        }else{
            session()->flash("message","something went wrong...");
            return view("admin.addcommi");
        }
    }

    // edit commition
    function editCom($id)
    {
        $edit = DB::table('_commitions')->where("id",$id)->get();
        return view("admin.editcommi",["edit"=>$edit]);
    }

    // edit save commition
    function editSaveData(Request $request)
    {
        $editsave = DB::table('_commitions')->where("id",$request->id)->update([
            "name"=>$request->name,
            "amount"=>$request->amount
        ]);
        if($editsave)
        {
            $view = DB::table('_commitions')->orderby("id","desc")->get();
            session()->flash("message","update successfully...");
        return view("admin.viewcommition",["view"=>$view]);
   
        }else{
            $view = DB::table('_commitions')->orderby("id","desc")->get();
            session()->flash("message","something went wrong...");
        return view("admin.viewcommition",["view"=>$view]);
        }
    }

    // for view add user form
    function viewaddUser()
    {
        $left = Db::table("users")->where("sponcer_id",auth()->user()->id)->get();
        $amount = Db::table("_commitions")->get();
        return view("admin.adduser",["left"=>$left,'amount'=>$amount]);
    }

    // for add user
    function addUser(Request $request)
    {
        $add = DB::table("users")->insertGetId([
            "name" => $request->name,
            "email" => $request->email,
            "sponcer_id" => $request->id,
            "position" => $request->position,
             "entry_fee" => $request->package,
            "password" => bcrypt($request->password), 
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
                    return view("admin.adduser"); // Redirect or show success message
               
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
            return view("admin.adduser"); // Redirect or show success message
        } else {
            session()->flash("message", "Something went wrong...");
            return view("admin.adduser");
        }
    }

    // for admin login
    function adminLogout()
    {
        Auth::logout();
        return redirect("/")->with("message"."logout successfully..");
    }
    
}
