<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function show()
    {

        return view('cart.show');
    }

    function add($id)
    {
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'thumnail' => $product->thumnail
            ],
        ]);
        return redirect('/');
    }

    function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart');
    }

    function removeAllItem()
    {
        Cart::destroy();
        return redirect('cart');
    }

    function update(Request $request)
    {
        //    dd($request->all());
        $data = $request->get('qty');
        foreach ($data as $key => $val) {
            Cart::update($key, $val);
        }
        return redirect('cart');
    }
}
