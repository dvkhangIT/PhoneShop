<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function getCate()
  {
    $data['categoryList'] = Category::all();
    return view('backend.category', $data);
  }
  public function getEditCate()
  {
    return view('backend.editcategory');
  }
  public function getDeleteCate()
  {
    return view('backend.editcategory');
  }
  public function postCate(AddCategoryRequest $request)
  {
    $category = new Category;
    $category->cate_name = $request->name;
    $category->cate_slug = Str::slug($request->name);
    $category->save();
    return back();
  }
}
