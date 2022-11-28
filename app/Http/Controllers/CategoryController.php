<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('backend.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.categories.show', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Deleted');
    }
    public function create()
    {
        return view('backend.categories.create');
    }
}
