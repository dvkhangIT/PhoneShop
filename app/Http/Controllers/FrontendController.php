<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function getHome()
  {
    $data['featured'] = Product::where('prod_featured', '=', 1)->take(8)->orderBy('prod_id', 'desc')->get();
    $data['new'] = Product::orderBy('prod_id', 'desc')->take(8)->get();
    return view('frontend.home', $data);
  }
}
