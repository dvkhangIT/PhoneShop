<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCateRequest;
use App\Models\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function getCate()
  {
    $data['categoryList'] = Category::all();
    return view('backend.category', $data);
  }
  public function getEditCate($id)
  {
    $data['cate'] = Category::find($id);
    return view('backend.editcategory', $data);
  }
  public function postEditCate(EditCateRequest $request, $id)
  {
    $category =  Category::find($id);
    $category->cate_name = $request->name;
    $category->cate_slug = Str::slug($request->name);
    $category->save();
    return redirect()->route('admin.category');
  }
  public function getDeleteCate($id)
  {
    Category::destroy($id);
    return redirect()->back();
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
