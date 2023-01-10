<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {

        $product->comments()->create(
            [
                'body' => $request->body,
                'commented_by' => Auth::id()
            ]
        );

        return redirect()->back();
        // dd(Auth::id());
        // dd($request->all());
        // dd($product);
    }
}
