<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::query();
        $brands = Brand::where('status', 'active')->get();
        if($search){
            $products = $products->where('status', 'active')->whereNull('deleted_at')->where('title', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->get();
        }else{
            if ($request->filled('categories')) {
                $products = $products->whereIn('category_id', $request->categories)->get();
                return view('user.search' , compact('products', 'brands'));
            }
            if ($request->filled('brands')) {
                $products = $products->whereIn('brand_id', $request->brands)->get();
                return view('user.search' , compact('products', 'brands'));
            }
            if ($request->filled('price_min')) {
                $products = $products->where('price', '>=', $request['price_min']);
                return view('user.search' , compact('products', 'brands'));
            }
            return view('user.search-not-found', compact('brands'));
        }
        if($products != null && $products->count() > 0){
            return view('user.search' , compact('products', 'brands'));
        }
        return view('user.search-not-found', compact('brands'));
    }
}
