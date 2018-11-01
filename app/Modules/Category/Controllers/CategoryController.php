<?php

namespace App\Modules\Category\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories = Category::select('categories', ['category_id', 'category_name'], ['is_deleted'=>2]);
        return view("Category::index", ['categories'=>$categories]);
    }

    /**
    * @DateOfCreation         24 Aug 2018
    * @ShortDescription       Function run according to the parameter if $user_id is NUll
    *                         then it return add view If we get ID it will return edit view
    * @return                 View
    */
    public function getCategory($category_id = null)
    {
        if (!empty($category_id)) {
            $categories = Category::select('categories', ['category_id', 'category_name'], ['is_deleted'=>2,'category_id'=>$category_id]);
            return view('Category::edit', ['categories'=>$categories]);
        } else {
            return view("Category::create");
        }
    }

    /**
    * @DateOfCreation         24 Aug 2018
    * @ShortDescription       This function handle the post request which get after submit the
    *                         and function run according to the parameter if $user_id is NUll
    *                         then it will insert the value If we get ID it will update the value
    *                         according to the ID
    * @param  object  $request [HTTP Request object]
    * @param  int     $user_id [id of user in case of edit,null in case of add]
    * @return                 Response
    */
    public function postCategory(Request $request, $category_id = null)
    {
        request()->validate(['category_name' => 'required',]);
        $category_name =  request()->input('category_name');
        if(!empty($category_id))
        {
            Category::update('categories', ['category_name' => $category_name],['category_id' => $category_id]);
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully.');
        }
        else
        {
            Category::insert('categories', ['category_name' => $category_name]);
            return redirect()->route('category.index')->with('success', 'New Category Created Successfully.');
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $categories = Category::select('categories', ['category_name'], ['is_deleted'=>2,'category_id'=>$id]);
        return view('Category::show', ['categories'=>$categories]);
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $categories = Category::update('categories', ['is_deleted' => 1 ], ['category_id'=>$id]);
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
