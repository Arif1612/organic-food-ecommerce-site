<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $product->cart()->create([
            'user_id' => Auth::id(),
            'qty' => 1
        ]);

        return redirect()->back();
    }
}
