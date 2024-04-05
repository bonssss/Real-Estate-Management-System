<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property\Property;

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

    return view('Property.single', compact('singleProp'));
}



} 