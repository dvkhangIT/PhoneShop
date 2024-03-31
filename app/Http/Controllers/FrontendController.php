<?php

namespace App\Http\Controllers;

use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function getHome()
  {
    $data['featured'] = Product::where('prod_featured', '=', 1)->take(8)->orderBy('prod_id', 'desc')->get();
    $data['new'] = Product::orderBy('prod_id', 'desc')->take(8)->get();
    $data['category'] = Category::all();
    return view('frontend.home', $data);
  }
  public function getDetail($id)
  {
    $data['detail'] = Product::find($id);
    return view('frontend.details', $data);
  }
  public function getCategory($id)
  {
    $data['items'] = Product::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(2);
    $data['cateName'] = Category::find($id);
    return view('frontend.category', $data);
  }
}
