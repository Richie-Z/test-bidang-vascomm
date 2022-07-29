<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except("logout");
        $this->middleware('guest:customer')->except("logout");
    }
    public function index()
    {
        return view("login", ["title" => "Login Admin", "url" => "processLoginAdmin", "isCustomer" => false]);
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username'   => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt($request->only("username", "password"))) {
            return redirect(RouteServiceProvider::ADMIN);
        }
        return redirect()->route("loginAdmin")->withErrors(['msg' => 'Credentials not matced in our records!']);
    }
    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("welcome");
    }
}
