<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function getAddCart($id)
  {
    $product = Product::find($id);
    // Cart::add([
    //   ['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_image]]
    // ]);

    // return back();
    $data = Cart::content();
    dd($data);
    // return view('frontend.cart');
  }
}
