<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Category;

class CategoryController extends Controller
{
    public function getCategoryIndex()
    {
        $categories = Category::OrderBy('created_at', 'desc')->paginate(5);
        return view('admin.blog.categories', ['categories'=>$categories]);
    }


    public function getCreateCategory()
    {
    }

    public function postCreateCategory(Request $request)
    {
        $this->validate($request, [
      'name' => 'required|unique:categories'
    ]);
        $category = new Category();
        $category->name = $request->name;

        if ($category->save()) {
            return Response::json(['message' => 'Category : '.$category->name.' created'], 200);
        }
        return Response::json(['message'=> 'Error during create'], 404);
    }

    public function postUpdateCategory(Request $request)
    {

        $this->validate($request, [
          'name' => 'required|unique:categories'
        ]);

        $category = Category::find($request['category_id']);
        if (!$category) {
            return Response::json(['message'=>'Category('.$request['category_id'].') not found.'], 404);
        }
        $category->name = $request['name'];
        $category->update();
        return Response::json(['message'=> 'Category updated.','new_name' => $category->name ], 200);
    }
}
