<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show()
    {

        $products = Product::all();
        return view('products.show', compact('products'));
    }

    // function add($id)
    // {
    //     $product = Product::find($id);
    //     dd($product);
    //     Cart::add([
    //         'id' => $product->id,
    //         'title' => $product->title,
    //         'thumnail' => $product->thumnail
    //     ]);

    //     // return Cart::content();
    // }
}
