<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //login for owner

    public function viewownerlogin()
    {

        return View('owner.loginpage');
    }



    public function loginowner(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('owner')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('view.owner.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

    }
    public function viewownerdashboard()

    {


        return View('owner.dashboard');
    }
}
