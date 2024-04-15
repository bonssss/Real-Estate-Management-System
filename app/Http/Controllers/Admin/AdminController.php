<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Agent\Agent;
use App\Models\Property\Property;
use App\Models\Property\PropertyType;
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
        $adminCount = Admin::select()->count();
        $propertyCount = Property::select()->count();
        $homeCount= PropertyType::select()->count();
        $buyCount =Property::select()->where('type','Buy')->count();

        return View('admin.index',compact('adminCount','propertyCount','homeCount','buyCount'));
    }





    public function showCreateAgentForm()
    {
        return view('admin.createagent');
    }

    public function createAgent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'password' => 'required|string|min:8',
        ]);

        // Create new agent
        $agent = new Agent();
        $agent->name = $validatedData['name'];
        $agent->email = $validatedData['email'];
        $agent->password = bcrypt($validatedData['password']);
        $agent->save();

        return redirect()->route('admin.agents')->with('success', 'Agent created successfully.');
    }



    public function  homeTypes()
    {
        $allproperytypes = PropertyType::select()->get();
        return view('admin.hometypes',compact('allproperytypes'));
    }


    public function  createhomeTypes()
    {
        return view('admin.createhometypes');
    }



    public function   savecreatehomeTypes (Request $request)
    {


        Request()->validate([
            "propstype"=> "required|max:50"
        ]);
       $savehometype = PropertyType::create([
        'propstype'=> $request->propstype,


       ]);
if($savehometype)
        return redirect('/admin/allhometypes')->with('success', 'Property type created successfully.');
    }



}



