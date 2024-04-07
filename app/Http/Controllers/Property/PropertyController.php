<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property\Property;
use App\Models\Property\PropertyImage;
use App\Models\Property\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
  public function index(){
    $Props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();


    return view('home', compact('Props'));
}

// property details

public function single($id){
    $singleProp = Property::find($id);

    $propertyimages = PropertyImage::where('prop_id',$id)->get();

    // related properties controller

    $relatedProperties = Property::where('home_type',$singleProp->home_type)->where('id','!=',$id)
    ->take(3)->orderBy('created_at','desc')->get();


    return view('Property.single', compact('singleProp','propertyimages','relatedProperties'));
}



public function sendRequest(Request $request){
  $sendrequest =Requests::create([

    "prop_id"=> $request->prop_id,
    "user_id"=> Auth::user()->id,
    "agent_name"=> $request->agent_name,
    "name"=> $request->name,
    "email"=> $request->email,
    "phone_number"=> $request->phone_number,


  ]);

  echo "request sent successfully";
 

  // return view('home', compact('Props'));
}

} 