<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile.edit');
    }

    public function update(Request $request){

        $request->validate([
            'image'=>'required|mimetypes:image/jpeg,image/png'
        ]);

        $file = $request->file("image");
        $fileName = uniqid()."_profile.".$file->getClientOriginalExtension();
        $dir = "/public/profile/";
//        $file->storeAs($dir,$file,$fileName);
//        $file->move('store/',$fileName);
        Storage::putFileAs($dir,$file,$fileName);

        $user = User::find(Auth::id());
        $user->image = $fileName;
        $user->update();

//        $arr = scandir(public_path('/storage'));
        return redirect()->route('profile.edit')->with("toast","Profile photo has been updated");

        return $request;
    }
}
