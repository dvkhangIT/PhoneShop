<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    $data['subtotal'] = Cart::subtotal();
    return view('frontend.cart', $data);
  }
  public function getDeleteCart($id)
  {
    if ($id == 'all') {
      Cart::destroy();
    } else {
      Cart::remove($id);
    }
    return back();
  }
  public function getUpdateCart(Request $request)
  {
    Cart::update($request->rowId, $request->qty);
  }
  public function postComplete(Request $request)
  {
    $data['info'] = $request->all();
    $data['cart'] = Cart::content();
    $data['subtotal'] = Cart::subtotal();
    $email = $request->email;
    Mail::send('frontend.email', $data, function ($message) use ($email) {
      $message->from('khangduong.dev@gamil.com', 'Phone Shop');
      $message->to($email, $email);
      $message->cc('khangduong.dev@gamil.com', 'Phone Shop');
      $message->subject('Xác nhận hóa đơn mua hàng');
    });
    Cart::destroy();
    return redirect('complete');
  }
  public function getComplete()
  {
    return view('frontend.complete');
  }
}
