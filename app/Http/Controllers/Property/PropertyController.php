<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property\Favorite;
use App\Models\Property\Property;
use App\Models\Property\PropertyImage;
use App\Models\Property\PropertyType;
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


    //validation send request
    $formvalidation = Requests::where('prop_id',$id)->where('user_id',Auth::user()->id)->count();


    //  validating  sending favorite items 
    $favoritevalidation = Favorite::where('prop_id',$id)->where('user_id',Auth::user()->id)->count();



    return view('Property.single', compact('singleProp','propertyimages','relatedProperties','formvalidation','favoritevalidation'));
}



public function sendRequest(Request $request){

  Request()->validate([

    "name"=> "required|max:50",
    "email"=> "required|max:80",
    "phone_number"=> "required|max:50",
  ]);

  $sendrequest =Requests::create([

    "prop_id"=> $request->prop_id,
    "user_id"=> Auth::user()->id,
    "agent_name"=> $request->agent_name,
    "name"=> $request->name,
    "email"=> $request->email,
    "phone_number"=> $request->phone_number,


  ]);

  if ($sendrequest) {
    return redirect('/props/property-details/'.$request->prop_id)->with('success', 'Request sent successfully');
}


  echo "request sent successfully";
 

  // return view('home', compact('Props'));
}




public function FavoriteList(Request $request){

 

  $saveFavorite =Favorite::create([

    "prop_id"=> $request->prop_id,
    "user_id"=> Auth::user()->id,
    "title"=> $request->title, 
    "image"=> $request->image,
    "location"=> $request->location,
    "price"=> $request->price,


  ]);

  if ($saveFavorite) {
    return redirect('/props/property-details/'.$request->prop_id)->with('save', 'Property saved successfully');
}

// echo "save success fully";
}


public function PropertyBuy(){
  $type ="Buy";

  $PropsBuy = Property::select()->where('type', $type)->get();


  return view('Property.propsbuy', compact('PropsBuy'));
}


public function PropertyRent(){
  $type ="Rent";

  $PropsRent = Property::select()->where('type', $type)->get();


  return view('Property.propsrent', compact('PropsRent'));
}


public function propType($propstype){

  $propertytypes = Property::select()->where('home_type', $propstype)->get();


  return view('Property.propsresidential',compact('propertytypes','propstype'));
}

} 