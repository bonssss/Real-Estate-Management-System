<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends Controller
{
    //
    // Other methods...

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loggedOut(Request $request)
    {
        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect('/home'); // Change this to redirect to your project's homepage
    }
}
