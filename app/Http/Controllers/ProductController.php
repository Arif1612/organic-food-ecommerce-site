<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function downloadPdf()
    {
        $products = Product::latest()->paginate(10);
        $pdf = Pdf::loadView('backend.products.pdf', compact('products'));
        return $pdf->download('ProductDetails.pdf');
    }

    public function downloadExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function trash()
    {
        // $products = Product::all();
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trash', compact('products'));
    }

    public function softDeleteShow($id)
    {
        $product = Product::onlyTrashed()->find($id);
        return view('backend.products.softDeleteShow', compact('product'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        return redirect()
            ->route('products.trash')
            ->withMessage('Successfully Restored');
    }

    public function delete($id)
    {
        $category = Product::onlyTrashed()->find($id);
        $category->forceDelete();
        return redirect()
            ->route('products.trash')
            ->withMessage('Successfully Deleted');
    }


    // Main Product CRUD Started
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d ') . time() . $originalName;
        $image->move(storage_path('app/public/products'), $fileName);
        return $fileName;
    }
    public function store(ProductRequest $request)
    {
        $fileName = $this->uploadImage($request->file('image'));

        $formData = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $fileName,
            'is_active' => $request->is_active ? true : false,
        ];


        Product::create($formData);
        return redirect()
            ->route('products.index')
            ->withMessage('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_active' => $request->is_active ? true : false,
        ];
        // aikhane jodi image ta thake thahole formdata ar modde image ta upload krbe
        if ($request->hasFile('image')) {
            $formData['image'] = $this->uploadImage($request->file('image'));
        }

        $product = Product::find($id);
        $product->update($formData);
        return redirect()
            ->route('products.index')
            ->withMessage('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withMessage('Successfully Deleted');
    }
}
