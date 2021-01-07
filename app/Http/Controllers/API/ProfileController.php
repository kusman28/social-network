<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function profile() 
    {
        return auth('web')->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth('web')->user();

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191|unique:users,email,
            '.$user->id,
            'password' => 'sometimes|required|string|min:8'
        ]);

        $currentPhoto = $user->profile_pic;
        if ($request->profile_pic != $currentPhoto) {
            $name = time().'.' . explode('/', explode(':', substr($request->profile_pic, 0, strpos($request->profile_pic, ';')))[1])[1];

            \Image::make($request->profile_pic)->save(public_path('images/profile/').$name);

            $request->merge(['profile_pic' => $name]);

            $userPhoto = public_path('images/profile/').$currentPhoto;
            if (file_exists($userPhoto)) {
                @unlink($userPhoto);
            }
            
        }

        $currentCover = $user->profile_cover;
        if ($request->profile_cover != $currentCover) {
            $name = time().'.' . explode('/', explode(':', substr($request->profile_cover, 0, strpos($request->profile_cover, ';')))[1])[1];

            \Image::make($request->profile_cover)->save(public_path('images/cover/').$name);

            $request->merge(['profile_cover' => $name]);

            $userCover = public_path('images/cover/').$currentCover;
            if (file_exists($userCover)) {
                @unlink($userCover);
            }
            
        }

        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
    }
}
