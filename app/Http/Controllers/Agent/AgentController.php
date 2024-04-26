<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property\Property;
use App\Models\Property\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    // public function  requestsAgent()
    // {
    //     $allrequests = Requests::select()->get();
    //     return view('agent.request', compact('allrequests'));
    // }

    public function requestsAgent()
{
    // Get the currently authenticated agent
    $agent = Auth::guard('agent')->user();

    if (!$agent) {
        // Handle case where agent is not authenticated
        return redirect()->route('view.login')->with('error', 'Agent not logged in.');
    }

    // Retrieve requests associated with the current agent
    $allrequests = Requests::where('agent_name', $agent->name)
                            ->get();

    return view('agent.request', compact('allrequests'));
}



public function  Properties()
    {
        $allproperty = Property::select()->get();
        return view('agent.propertylist', compact('allproperty'));
    }


}
