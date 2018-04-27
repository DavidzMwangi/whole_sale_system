<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function profile()
    {
        //get the profile details for the company
        $profile=Profile::find(1);
        return View::make('settings.profile')->with('profile',$profile);
    }

    public function changePic(Request $request)
    {
        if($request->hasFile("company_profile_pic")){
            if ($request->file('company_profile_pic')->isValid()) {
                //save the picture in public folder


//
                $file = $request->file('company_profile_pic');
                $original_name = $file->getClientOriginalName();
                $imageName = uniqid(true) . $original_name;
                $path = public_path('uploads/company_profile/' . $imageName);
                Image::make($file)->save($path);


                $destpath=public_path() . "/uploads/company_profile/";
                $fileName=rand(111111,999999) . "." . $request->file('company_profile_pic')->getClientOriginalExtension();
                $request->file('company_profile_pic')->move($destpath, $fileName);

                //save the link to the database
                $data=Profile::find(1);
                $data->company_pic=$fileName;
                $data->save();

                return redirect()->back()->withErrors(new MessageBag(['Update'=>'The Picture has been updated']));
            }
        }
        else{


            return redirect()->back()->withErrors(new MessageBag(['problem'=>"The picture selected cannot be used as company profile"]));

        }

    }

    public function updateCompany(Request $request)
    {
        $profile=Profile::find(1);
        $profile->company_name=$request->input('company_name');
        $profile->company_initials=$request->input('company_initials');
        $profile->company_phone_no=$request->input('company_phone_no');
        $profile->company_address=$request->input('company_address');
        $profile->company_email=$request->input('company_email');
        $profile->company_website=$request->input('company_website');
        $profile->company_location=$request->input('company_location');
        $profile->save();

        return redirect()->back();
    }
}
