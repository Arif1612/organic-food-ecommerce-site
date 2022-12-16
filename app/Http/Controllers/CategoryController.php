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
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }
    public function store(CategoryRequest $request)
    {

        $originalName = $request->file('image')->getClientOriginalName();
        // dd($originalName);
        $fileName = date('Y-m-d ') . time() . $originalName;
        $request->file('image')->move(storage_path('app/public/categories'), $fileName);


        // dd($fileName);
        // dd($request->file('image'));


        $formData = [
            'name' => $request->name,
            "is_active" => $request->is_active ? true : false,
            'image' => $fileName
        ];


        Category::create($formData);
        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Created');
    }
    public function update(CategoryRequest $request, $id)
    {
        // dd($request->all());
        $category = Category::find($id);

        $formData = [
            'name' => $request->name,
            "is_active" => $request->is_active ? true : false,
        ];
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = date('Y-m-d ') . time() . $originalName;
            $request->file('image')->move(storage_path('app/public/categories'), $fileName);
            $formData['image'] = $fileName;
        }

        $category->update($formData);
        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Updated');
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
