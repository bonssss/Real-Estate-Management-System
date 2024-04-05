<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Models\Property\PropertyImage;

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


    return view('Property.single', compact('singleProp','propertyimages'));
}



} 