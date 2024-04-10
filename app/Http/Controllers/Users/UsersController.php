<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Property\Property;
use App\Models\Property\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Method to fetch user requests
    public function showUserRequests()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Query requests for the authenticated user
        $userRequests = Requests::where('user_id', $userId)->get();

        $requestsWithDetails = $userRequests->map(function ($request) {
          $property = Property::find($request->prop_id);
          return [
              'request' => $request,
              'property' => $property,
          ];
      });
  
      return view('users.userrequests', compact('requestsWithDetails'));
  }
}