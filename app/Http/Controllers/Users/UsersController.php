<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Property\Favorite;
use App\Models\Property\Property;
use App\Models\Property\Requests;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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


  public function showUserFavorites(){
    $userId = Auth::id();

    // Query requests for the authenticated user
    $userFavorite = Favorite::where('user_id', $userId)->get();

    $FavoriteWithDetails = $userFavorite->map(function ($request) {
        $property = Property::find($request->prop_id);
        return [
            'request' => $request,
            'property' => $property,
        ];
    });


    return View('users.userfavorite', compact('FavoriteWithDetails'));

  }


  public function showChangePasswordForm()
  {
      return view('auth.changepassword');
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

      return redirect()->route('home')->with('success', 'Password changed successfully!');
  }
}
