<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property\Property;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function viewagentlogin()
    {

        return View('agent.loginpage');
    }
    public function agentlogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('agent')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('view.agent.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

    }





    public function viewagentdashboard()

    {
        $propertyCount = Property::select()->count();


        return View('agent.dashboard',compact('propertyCount'));
    }




}
