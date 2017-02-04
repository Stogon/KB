<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryAndSectionController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $sections = $category->sections;

        $title = $category->name;

        return view('categories.sections', compact('title', 'sections'));
    }
}
