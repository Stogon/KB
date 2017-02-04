<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('home.index', compact('categories'));
    }
}
