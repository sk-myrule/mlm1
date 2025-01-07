<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// for admin dashboard
Route::get("admin/dash",[Usercontroller::class,"dashboardPath"]);

// for View Commition details
Route::get("viewadcommition",[Usercontroller::class,"viewAddCommition"])->name("admin.viewcom");

// for view add com page
Route::view("addcommition","admin/addcommi")->name("admin.addcom");

// for add commition details
Route::post("addcommition",[Usercontroller::class,"addSubmitCom"])->name("admin.submitaddcom");

// for edit commitiom details
Route::get("editcommit/{id}",[Usercontroller::class,"editCom"])->name("admin.editcom");

// for edit add commition details
Route::post("editsave",[Usercontroller::class,"editSaveData"])->name("admin.editsavecom");

// for add user
// Route::view("adduser","admin/adduser");
Route::get("adduser",[Usercontroller::class,"viewaddUser"]);
// route for add users
Route::post("adduser",[Usercontroller::class,"addUser"])->name("admin.adduser");

// for admin logout
Route::get("logout",[Usercontroller::class,"adminLogout"])->name("admin.logout");

// for user add user
// Route::view("useraddform","adduser")->name("user.adduser");
Route::get("useraddform",[UserDashboardController::class,"viewAddUser"])->name("user.viewadduser");

// for user add 
Route::post("addsecuser",[UserDashboardController::class,"addUser"])->name("user.adduser");

// for user logout
Route::get("userlogout",[UserDashboardController::class,"userLogout"])->name("user.logout");

// for view user commiton
Route::get("usercomview",[UserDashboardController::class,"viewCommition"])->name("user.commition");

// for view commition
Route::get("admin/viewcom",[UserDashboardController::class,"adminViewCommition"])->name("admin.viewallcommition");

// for view adminleft And right user details
Route::get("admin/viewleftandright",[UserDashboardController::class,"adminViewLeftAndRight"])->name("admin.view_leftandright");

// for user my users
Route::get("myusers",[UserDashboardController::class,"viewMyUsers"])->name("user.myusers");