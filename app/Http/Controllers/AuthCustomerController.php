<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthCustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:customer')->except("logout");
        $this->middleware('guest:admin')->except("logout");
    }
    public function index()
    {
        return view("login", ["title" => "Login Customer", "url" => "processLoginCustomer", "isCustomer" => true]);
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username'   => 'required',
            'password' => 'required'
        ]);
        if (isCustomerApproved($request->username)) {
            if (Auth::guard('customer')->attempt($request->only("username", "password"))) {
                return redirect(RouteServiceProvider::HOME);
            }
            return redirect()->route("loginCustomer")->withErrors(['msg' => 'Credentials not matced in our records!']);
        }
        return redirect()->route("loginCustomer")->withErrors(['msg' => 'Your inputed username is not approved or not exist!']);
    }

    public function logout()
    {
        Auth::guard("customer")->logout();
        return redirect()->route("welcome");
    }
}
