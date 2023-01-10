<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        if ($keyword = request('keyword')) {
            $products = Product::latest()
                ->where('name', 'LIKE', "%{$keyword}%")
                ->paginate(12);
        } else {
            $products = Product::latest()->paginate(12);
        }
        $carousels = Carousel::latest()->get();
        return view('welcome', compact('products', 'carousels'));
    }

    public function productList(Category $category)
    {
        return view('products', compact('category'));
    }
    public function productDetails(Product $product)
    {
        return view('product', compact('product'));
    }
}
