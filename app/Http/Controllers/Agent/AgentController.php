<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function viewagentlogin()
    {

        return View('agent.loginpage');
    }


    // public function viewagentdashboard()
    // {

    //     return View('layouts.dashboard');
    // }


}
