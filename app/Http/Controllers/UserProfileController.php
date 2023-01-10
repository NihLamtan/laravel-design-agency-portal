<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('account.user.index');
    }

    public function update(Request $request)
    {

        if($request->profile_photo_path){
        request()->validate([
            'profile_photo_path' => 'image|required|mimes:jpeg,png,jpg'
        ]);
        }

       if($request->profile_photo_path){
        $image       = $request->file('profile_photo_path');
        $filename    = $image->getClientOriginalName();

        $image->move(public_path().'/full/',$filename);
        $image_resize = Image::make(public_path().'/full/'.$filename);
        $image_resize->fit(70, 70);
        $image_resize->save(public_path('thumbnail/' .$filename));
    }
      
        if(!$request->profile_photo_path){
        $user = auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'location' => $request->location,
            'bio' => $request->bio,
            'company_name' => $request->company_name,
            'company_url' => $request->company_url,
        ]);
        }

        if($request->profile_photo_path){
            auth()->user()->update([
            'profile_photo_path' => $filename

            ]);

        }
        return redirect()->back()->with('success', 'Profile has been update');
    }

    public function view_chnge_password()
    {
        return view('account.user.update-password');
    }

    public function update_password(Request $request)
    {
        if ($request->hasFile('profile_photo_path')) {
            $profile = $request->profile_photo_path->getClientOriginalName();
            $request->file('profile_photo_path')->storeAs('public/images/user/profile', $profile);
        }

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 1) {
            //Current password and new password are same
            return redirect()->back()->with('error', 'New password in confirmed  password not match.');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully !');
    }

    public function view_setting()
    {
        return view('account.user.setting');
    }

    
    public function update_setting(Request $request)
    {
        request()->validate([
            'user_name' => 'required',
            'email' => 'required',

        ]);

        $user = auth()->user()->update([
            'user_name' => $request->user_name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile has been update');
    
    }

    
}
