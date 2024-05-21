<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use App\Models\Property\Property;
use App\Models\Property\PropertyType;
use App\Models\Property\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    // Display the login page for the owner
    public function viewownerlogin()
    {
        return view('owner.loginpage');
    }

    // Handle the owner's login
    public function loginowner(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        // Attempt to log in the owner
        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return redirect()->route('view.owner.dashboard')->with('toast_success', 'Login successful!');
        }

        // Store error message in session
        Session::flash('toast_error', 'Invalid email or password');

        // Redirect back to the login page
        return redirect()->route('view.owner.login');
    }

    // Display the owner's dashboard
    public function viewownerdashboard()
    {
        return view('owner.dashboard');
    }

    public function showChangePasswordForm()
    {
        return view('owner.changepassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password with the new hashed password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/owner/dashboard')->with('success', 'Password changed successfully!');
    }



    // logout
    public function logout(Request $request)
    {
        Auth::guard('owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('view.owner.login')->with('success', 'You have been logged out.');
    }


    //count


public function ownercountDashboard()
{
    $requestCount = Requests::count();
    $agentCount = Agent::count();
    $propertyCount = Property::count();
    $homeCount = PropertyType::count();
    $buyCount = Property::where('type', 'Buy')->count();
    $rentedCount = Property::where('status', 'rented')->count();
    $vacantCount = Property::where('status', 'vacant')->count();

    return view('view.owner.dashboard', compact('agentCount', 'propertyCount', 'homeCount', 'buyCount', 'requestCount', 'rentedCount', 'vacantCount', 'tenantCount'));
}
}
