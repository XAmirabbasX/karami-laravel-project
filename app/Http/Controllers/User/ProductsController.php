<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function singleProduct($tracking_code, $title = null){
        $product = Product::with('images')->where('tracking_code', $tracking_code)->first();
        $similarProducts = Product::with('images')->where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('user.single-product', compact('product', 'similarProducts'));
    }
}
