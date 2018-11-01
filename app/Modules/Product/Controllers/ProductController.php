<?php

namespace App\Modules\Product\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('products', ['product_id', 'product_name', 'product_price', 'product_discount', 'product_selling_price'], ['is_deleted'=>2]);
        return view("Product::index", ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Product::select('categories', ['category_id', 'category_name'], ['is_deleted'=>2]);
        return view("Product::create", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'product_name'          => 'required',
            'product_price'         => 'required',
            'product_discount'      => 'required',
            'product_selling_price' => 'required',
            'category_name'         => 'required',
            'product_image'                  => 'required'
        ]);
        $fileName              = request()->product_image->getClientOriginalName();

        $filePath              = request()->product_image->move(public_path('files'), $fileName);

        $product_name          = request()->input('product_name');
        $product_price         = request()->input('product_price');
        $product_discount      = request()->input('product_discount');
        $product_selling_price = request()->input('product_selling_price');
        $category_id  = request()->input('category_name');
        $insert_array = ['product_name'           => $product_name,
        'product_description'   => '',
        'product_price'         => $product_price,
        'product_discount'      => $product_discount,
        'product_selling_price' => $product_selling_price,
        'product_image'         => $fileName,
        'category_id'           => $category_id];

        Product::insert('products', $insert_array);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::select('products', ['product_id', 'product_name', 'product_description','product_price', 'product_discount', 'product_selling_price','category_id'], ['is_deleted'=>2,'product_id'=>$id]);
        $categories = Product::select('categories', ['category_id', 'category_name'], ['is_deleted'=>2]);
        return view('Product::edit', ['products'=>$products,'categories'=>$categories]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
