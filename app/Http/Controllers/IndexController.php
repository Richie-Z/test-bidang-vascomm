<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view("welcome", ["products" => Product::all(), "count" => Product::count()]);
    }
}
