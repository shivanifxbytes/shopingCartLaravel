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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Category::create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['category_name' => 'required',]);
        $category_name =  request()->input('category_name');
        Category::insert('categories', ['category_name' => $category_name]);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select('categories', ['category_id', 'category_name'], ['is_deleted'=>2,'category_id'=>$id]);
        return view('Category::edit', ['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(['category_name' => 'required',]);
        $category_name =  request()->input('category_name');
        Category::update('categories', ['category_name' => $category_name ], ['category_id'=>$id]);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
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
