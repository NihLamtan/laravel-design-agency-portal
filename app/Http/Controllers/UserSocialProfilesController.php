<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSocialProfile;
use App\Models\User;

class UserSocialProfilesController extends Controller
{
    public function  index()
    {
        return view('account.user.social-profile');
    }

    
    public function update(Request $request)
    {
        
        request()->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',

        ]);
       
        if(auth()->user()->social_profile()->count() > 0){
        auth()->user()->social_profile()->update([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,

        ]);
        }else{
            auth()->user()->social_profile()->create([
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
    
            ]);
        }

        return redirect()->back()->with('success', 'Profile has been update');
    
    }
    

}
