<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  public function getProduct()
  {
    return view('backend.product');
  }
  public function postProduct()
  {
  }
  public function getAddProduct()
  {
    $data['categoryList'] = Category::all();
    return view('backend.addproduct', $data);
  }
  public function postAddProduct(AddProductRequest $request)
  {
    $filename = $request->img->getClientOriginalName();
    $product = new Product;
    $product->prod_name = $request->name;
    $product->prod_slug = Str::slug($product->name);
    $product->prod_image = $filename;
    $product->prod_accessories = $request->accessories;
    $product->prod_price = $request->price;
    $product->prod_warranty = $request->warranty;
    $product->prod_promotion = $request->promotion;
    $product->prod_condition = $request->condition;
    $product->prod_status = $request->status;
    $product->prod_description = $request->description;
    $product->prod_cate = $request->cate;
    $product->prod_featured = $request->featured;
    $product->save();
    $request->img->storeAs('avatar', $filename);
    return back();
  }
  public function getEditProduct()
  {
    return view('backend.editproduct');
  }
  public function postEditProduct()
  {
  }
  public function getDeleteProduct()
  {
  }
}
