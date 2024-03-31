<?php

namespace App\Http\Controllers;

use App\Models\Models\Category;
use App\Models\Models\Comment;
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
    $data['comments'] = Comment::where('com_product', $id)->get();
    return view('frontend.details', $data);
  }
  public function getCategory($id)
  {
    $data['items'] = Product::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(2);
    $data['cateName'] = Category::find($id);
    return view('frontend.category', $data);
  }
  public function postComment(Request $request, $id)
  {
    $comment = new Comment();
    $comment->com_name = $request->name;
    $comment->com_email = $request->email;
    $comment->com_content = $request->content;
    $comment->com_product = $id;
    $comment->save();
    return back();
  }
  public function getSearch(Request $request)
  {
    $result = $request->result;
    $result = str_replace(' ', '%', $result);
    $data['items'] = Product::where('prod_name', 'like', '%' . $result . '%')->get();
    $data['keyword'] = $result;
    return view('frontend.search', $data);
  }
}
