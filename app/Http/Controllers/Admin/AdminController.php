<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewLogin(){

        return View('admin.login');
    }

    public function checkLogin(Request $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

    }


    public function adminDashboard(){

        return View('admin.index');
    }

    
   
}
