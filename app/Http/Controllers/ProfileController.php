<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $fileName = uniqid()."_".$file->getClientOriginalName();
//        $file->move('store/',$fileName);
        Storage::put("/public/",$file);

        $arr = scandir(public_path('/storage'));
        return view('profile.edit',compact('arr'));

        return $request;
    }
}
