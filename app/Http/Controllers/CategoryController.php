<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
    public function create()
    {
        return view('backend.categories.create');
    }
    public function store(CategoryRequest $request)
    {

        $formData = [
            'name' => $request->name,
            "is_active" => $request->isActive ? true : false
        ];

        Category::create($formData);
        return redirect()
            ->route('categories.create')
            ->withMessage('Successfully Created');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Deleted');
    }
}
