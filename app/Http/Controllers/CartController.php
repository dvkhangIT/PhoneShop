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
    Cart::add([
      ['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_image]]
    ]);
    $data = Cart::content();
    return redirect()->route('cart.show');
  }
  public function getShowCart()
  {
    $data['items'] = Cart::content();
    $data['total'] = Cart::total();
    return view('frontend.cart', $data);
  }
}
