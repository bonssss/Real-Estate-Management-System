<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use App\Models\Property\Property;
use Illuminate\Http\Request;
use App\Models\Property\PropertyType;
use App\Models\Property\Requests;
use App\Models\Property\PropertyImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{



    public function viewagentlogin(){
        return view('agents.login');
    }

    public function checkLogin(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('agent')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('agent.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function agentlogout(Request $request)
    {
        Auth::guard('agent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('view.agent.login'); // Redirect to the login page after logout
    }


    public function index(){
        $agentId = Auth::guard('agent')->id();

        // $requestCount = Requests::where('agent_id', $agentId)->count();
        $rentedCount = Property::where('status', 'rented')->where('agent_id', $agentId)->count();
        $soldCount = Property::where('status', 'sold')->where('agent_id', $agentId)->count();
        $processingCount = Property::where('status', 'Processing')->where('agent_id', $agentId)->count();
        $rentCount = Property::where('type', 'Rent')->where('agent_id', $agentId)->count();

        $propertyCount = Property::where('agent_id', $agentId)->count();
        $homeCount = PropertyType::count();
        $buyCount = Property::where('type', 'Buy')->where('agent_id', $agentId)->count();

        return view('agents.index', compact('propertyCount', 'homeCount', 'buyCount', 'rentCount'));
    }

    public function allHomeTypes(){

        $allHomeTypes = PropertyType::select()->get();

        return view('agents.hometypes', compact('allHomeTypes'));
    }

    public function createHomeTypes(){


        return view('agents.createhometypes');
    }

    public function saveHomeTypes(Request $request){
        Request()->validate([
            "propstype" => "required|max:40"
        ]);
        $saveHomeTypes = PropertyType::create([
            'propstype' => $request->propstype,

        ]);

        if($saveHomeTypes) {

            return redirect('/agent/all-hometypes/')->with('success', 'Home Type Created Successfully');
        }
    }

    public function updateHomeTypes($id){

         $homeType = PropertyType::find($id);

        return view('agents.updatehometypes', compact('homeType'));
    }

    public function editHomeTypes(Request $request, $id){
        Request()->validate([
            "propstype" => "required|max:50"
        ]);

        $singlehometype = PropertyType::find($id);
        $singlehometype->update($request->all());


        if ($singlehometype) {
            return redirect('/admin/allhometypes')->with('update', 'Property type  updated successfully.');
        }
    }

    public function deleteHomeTypes($id){

        $homeType = PropertyType::find($id);
        $homeType->delete();

        if($homeType) {

            return redirect('/agent/all-hometypes/')->with('delete', 'Home Type Deleted Successfully');
        }
   }

    public function Requests(){

        $requests = Requests::all();

    return view('agents.requests', compact('requests'));
    }

    public function allProperty(){
        $agentId = auth()->guard('agent')->id();

        // Retrieve properties specific to the authenticated agent
        $properties = Property::where('agent_id', $agentId)->get();

        // Pass the properties data to the view
        return view('agents.property', compact('properties'));
    }

    public function createProperty(){



    return view('agents.createproperty');
    }

    public function addProperty(Request $request) {
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $addProperty = Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $myimage,
            'beds' => $request->beds,
            'baths' => $request->baths,
            'sq/ft' => $request->{'sq/ft'},
            'year_built' => $request->year_built,
            'price/sqft' => $request->{'price/sqft'},
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'home_type' => $request->home_type,
            'type' => $request->type,
            'city' => $request->city,
            'more_info' => $request->more_info,
            'agent_name' => $request->agent_name,
            'agent_id' => auth()->id(), // Set the agent_id here
        ]);

        if($addProperty) {
            return redirect('/agent/all-property/')->with('success', 'Property Added Successfully');
        }
    }


    public function createGallery(){

        $property = Property::all();

        return view('agents.creategallery', compact('property'));
    }

    public function addGallery(Request $request)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|array', // 'image' field must be present and an array
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image file
            'prop_id' => 'required|integer', // 'prop_id' must be present and an integer
        ]);

        // Process uploaded files
        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                // Generate a unique filename
                $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store the file in the specified directory
                $savepath = public_path('assets/postimages/');
                $file->move($savepath, $name);

                // Create a new PropertyImage record
                PropertyImage::create([
                    'image' => $name,
                    'prop_id' => $request->prop_id,
                ]);
            }

            // Redirect back with success message if files were processed successfully
            return redirect('/agent/all-property')->with('success_gallery', 'Images uploaded successfully.');
        }

        // Handle case when no files were uploaded (shouldn't reach here with required validation)
        return redirect('/agent/all-property')->with('error', 'No images uploaded.');
    }

    public function  deleteProperty($id)
    {

        $deleteProperty = Property::find($id);
        if(File::exists(public_path('assets/images/' . $deleteProperty->image))){
            File::delete(public_path('assets/images/' . $deleteProperty->image));
        }else{
            //dd('File does not exists.');
        }
        $deleteProperty->delete();

        $deleteGallery = PropertyImage::where("prop_id",$id)->get();
        foreach($deleteGallery as $delete){
            if(File::exists(public_path('assets/image_gallery/' . $delete->image))){
                File::delete(public_path('assets/image_gallery/' . $delete->image));
            }else{
                //dd('File does not exists.');
            }

            $delete->delete();
        }
                if ($deleteProperty) {
                    return redirect('/agent/all-property')->with('delete', 'Property deleted successfully.');
                }
    }




    public function updateStatus(Request $request, $id)
{
    $property = Property::findOrFail($id);
    $property->status = $request->input('status');
    $property->save();

    return redirect()->back()->with('success', 'Status updated successfully');
}




public function agentProperties($agentId)
    {
        // Fetch the agent details from the database
        $agent = Agent::findOrFail($agentId);

        // Fetch properties specific to this agent
        $properties = Property::where('agent_id', $agentId)->get();

        // Pass the agent and properties data to the view
        return view('agents.property', compact('agent', 'properties'));
    }





}
