<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Agent\Agent;
use App\Models\Property\Property;
use App\Models\Property\PropertyImage;
use App\Models\Property\PropertyType;
use App\Models\Property\Requests;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    //
    public function viewLogin()
    {

        return View('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }


    public function adminDashboard()
    {
        $adminCount = Admin::select()->count();
        $propertyCount = Property::select()->count();
        $homeCount = PropertyType::select()->count();
        $buyCount = Property::select()->where('type', 'Buy')->count();

        return View('admin.index', compact('adminCount', 'propertyCount', 'homeCount', 'buyCount'));
    }





    public function showCreateAgentForm()
    {
        return view('admin.createagent');
    }

    public function createAgent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'password' => 'required|string|min:8',
        ]);

        // Create new agent
        $agent = new Agent();
        $agent->name = $validatedData['name'];
        $agent->email = $validatedData['email'];
        $agent->password = bcrypt($validatedData['password']);
        $agent->save();

        return redirect()->route('admin.agents')->with('success', 'Agent created successfully.');
    }



    public function  homeTypes()
    {
        $allproperytypes = PropertyType::select()->get();
        return view('admin.hometypes', compact('allproperytypes'));
    }


    public function  createhomeTypes()
    {
        return view('admin.createhometypes');
    }



    public function   savecreatehomeTypes(Request $request)
    {


        Request()->validate([
            "propstype" => "required|max:50"
        ]);
        $savehometype = PropertyType::create([
            'propstype' => $request->propstype,


        ]);
        if ($savehometype)
            return redirect('/admin/allhometypes')->with('success', 'Property type created successfully.');
    }


    public function  updatehomeTypes($id)
    {

        $propertytypeedit = PropertyType::find($id);

        return view('admin.updatehometypes', compact('propertytypeedit'));
    }


    // update


    public function saveupdatehomeTypes(Request $request, $id)
    {


        Request()->validate([
            "propstype" => "required|max:50"
        ]);

        $singlehometype = PropertyType::find($id);
        $singlehometype->update($request->all());


        if ($singlehometype) {
            return redirect('/admin/allhometypes')->with('update', 'Property type  updated successfully.');
        }
    }




    // delete
    public function  deletehomeTypes($id)
    {

        $propertytypedelete = PropertyType::find($id);
        $propertytypedelete->delete();


        if ($propertytypedelete) {
            return redirect('/admin/allhometypes')->with('delete', 'Property type  deleted successfully.');
        }
    }




    // requests

    public function  requestsAdmin()
    {
        $allrequests = Requests::select()->get();
        return view('admin.allrequests', compact('allrequests'));
    }

    /// properties
    public function  Properties()
    {
        $allproperty = Property::select()->get();
        return view('admin.propertylist', compact('allproperty'));
    }

    //create property
    public function  createProperties()
    {
        return view('admin.propertycreate');
    }


    public function  savecreateProperties(Request $request)
    {


        // Request()->validate([
        //     "propstype"=> "required|max:50"
        // ]);
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);




        $saveproperties = Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $myimage,
            'beds' => $request->beds,
            'baths' => $request->baths,
            'sq/ft' => $request->{'sq/ft'},
            'year_built' => $request->year_built,
            'price/sqft' => $request->{'price/sqft'},

            'location' => $request->location,
            'home_type' => $request->home_type,
            'type' => $request->type,
            'city' => $request->city,
            'more_info' => $request->more_info,

            'agent_name' => $request->agent_name,




        ]);


        if ($saveproperties) {
            return redirect('/admin/allproperties')->with('success', 'Property  created successfully.');
        }
    }



    // create post images
    public function  createimagespost()

    {
        $allpropert =Property::all();
        return view('admin.postimagescreate', compact('allpropert'));
    }



    public function saveimagespost(Request $request)
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
            return redirect('/admin/allproperties')->with('success', 'Images uploaded successfully.');
        }

        // Handle case when no files were uploaded (shouldn't reach here with required validation)
        return redirect('/admin/allproperties')->with('error', 'No images uploaded.');
    }

    // public function  saveimagespost(Request $request)
    //     {
    //     //     $this->validate($request, [
    //     //         'filenames' => 'required',
    //     //         'filenames.*' => 'image'
    //     // ]);

    //     $files = [];
    //     if($request->hasfile('image'))
    //      {
    //         foreach($request->file('image ') as $file)
    //         {
    //             $savepath= "assets/postimages/";
    //             $name = time().rand(1,50).'.'.$file->extension();
    //             $file->move(public_path($savepath), $name);
    //             $files[] = $name;

    //             PropertyImage::create([
    //                 "prop_id"=> $request->prop_id,

    //                 "image"=>$name,


    //             ]);
    //         }
    //      }

    //     //  $file= new File();
    //     //  $file->filenames = $files;
    //     //  $file->save();


    //     if($name){
    //         return redirect('/admin/allproperties')->with('images', 'Images  created successfully.');
    //     }    }




    /// delete properties
    public function  deleteProperties($id)
    {

        $propertydelete = Property::find($id);
        if(File::exists(public_path('assets/images/' . $propertydelete->image))){
            File::delete(public_path('assets/images/' . $propertydelete->image));
        }else{
            //dd('File does not exists.');
        }
        $propertydelete->delete();

$deleteimages = PropertyImage::where("prop_id",$id)->get();
   foreach($deleteimages as $delete)
   {
    if(File::exists(public_path('assets/postimages/' . $delete->image))){
        File::delete(public_path('assets/postimages/' . $delete->image));
    }else{
        //dd('File does not exists.');
    }

    $delete->delete();
   }
        if ($propertydelete) {
            return redirect('/admin/allproperties')->with('delete', 'Property type  deleted successfully.');
        }
    }



}
