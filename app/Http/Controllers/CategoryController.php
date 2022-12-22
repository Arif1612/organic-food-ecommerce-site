<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class CategoryController extends Controller
{
    function downloadPdf()
    {
        $categories = Category::all();
        $pdf = Pdf::loadView('backend.categories.pdf', compact('categories'));
        return $pdf->download('CategoryDetails.pdf');
    }
    public function downloadExcel()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
    // softdelets
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('backend.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully Restored');
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();
        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully Deleted');
    }

    public function softDeleteShow($id)
    {
        $category = Category::onlyTrashed()->find($id);
        return view('backend.categories.softDeleteShow', compact('category'));
    }


    // categories main crud started

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

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d ') . time() . $originalName;
        $image->move(storage_path('app/public/categories'), $fileName);

        // Image::make($image)
        //     ->resize(500, 500)
        //     ->save(storage_path() . '/app/public/categories/' . $fileName);


        return $fileName;
    }
    public function store(CategoryRequest $request)
    {

        $fileName = $this->uploadImage($request->file('image'));

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
        $formData = [
            'name' => $request->name,
            "is_active" => $request->is_active ? true : false
        ];
        // aikhane jodi image ta thake thahole formdata ar modde image ta upload krbe
        if ($request->hasFile('image')) {
            $formData['image'] = $this->uploadImage($request->file('image'));
        }

        $category = Category::find($id);
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
