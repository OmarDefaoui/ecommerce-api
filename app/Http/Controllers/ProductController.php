<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * get latest products.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        return ProductResource::collection(Product::latest()->take(6)->get());
    }

    /**
     * get products from specific category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(int $category)
    {
        return ProductResource::collection(Product::where('product_category_id', $category)->get());
    }

    /**
     * get products from specific global category.
     *
     * @return \Illuminate\Http\Response
     */
    public function globalCategory(int $globalCategory)
    {
        return ProductResource::collection(
            Product::join(
                'product_categories',
                'products.product_category_id',
                '=',
                'product_categories.id'
            )->where('global_category_id', $globalCategory)->get()
        );
    }

    /**
     * Search for products from title
     *
     * @return \Illuminate\Http\Response
     */
    public function search(String $title)
    {
        return ProductResource::collection(Product::where('title', 'like', '%' . $title . '%')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
