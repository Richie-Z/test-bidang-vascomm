<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerController extends Controller
{
    public function register()
    {
        return view("register");
    }
    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username'   => 'required|unique:customers,username',
            'password' => 'required',
            'image' => 'required|imageable'
        ]);
        $img  = $request->image;
        $imageParts = explode(";base64,", $img);
        $imageType = explode("image/", $imageParts[0])[1];
        $imageBase64 = base64_decode($imageParts[1]);
        $fileName = uniqid() . ".$imageType";
        $file = "/customers/$fileName";
        Image::make($imageBase64)->save(public_path() . $file);
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->username = $request->username;
            $customer->password =  app("hash")->make($request->password);
            $customer->image = $fileName;
            $customer->save();
            return redirect()->route("register")->with('success', "Success Register");
        } catch (\Throwable $th) {
            return redirect()->route("register")->withErrors(['msg' => $th]);
        }
    }
}
