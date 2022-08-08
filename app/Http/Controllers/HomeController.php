<?php

namespace App\Http\Controllers;

use App\Http\Resources\GlobalCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Cashback;
use App\Models\GlobalCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        $cashback = Cashback::first();
        $global_categories = GlobalCategoryResource::collection(GlobalCategory::all());
        $latest_products = ProductResource::collection(Product::latest()->take(6)->get());

        return [
            'user' => $user,
            'cashback' =>  $cashback,
            'global_categories' => $global_categories,
            'latest_products' =>  $latest_products
        ];
    }
}
