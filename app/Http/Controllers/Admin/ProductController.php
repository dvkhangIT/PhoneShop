<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    return view('backend.addproduct');
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
