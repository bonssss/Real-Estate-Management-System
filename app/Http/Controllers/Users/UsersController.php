<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Property\Favorite;
use App\Models\Property\Property;
use App\Models\Property\Requests;
use Illuminate\Contracts\View\View;
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
}