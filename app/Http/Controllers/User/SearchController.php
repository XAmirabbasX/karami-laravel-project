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
            }
            if ($request->filled('brands')) {
                $products = $products->whereIn('brand_id', $request->brands)->get();
            }
            if ($request->filled('price_min') && $request->filled('price_max')) {
                $products = $products->where('price', '>=', $request->price_min)->where('price', '<=', $request->price_max)->get();
            }
            if ($request->filled('price_min')) {
                $products = $products->where('price', '>=', $request->price_min)->get();
            }
            if ($request->filled('price_max')) {
                $products = $products->where('price', '<=', $request->price_max)->get();
            }
            if (!empty($request->sort)) {
                switch ($request->sort){
                    case 'new':
                        $products = $products->orderBy('created_at', 'desc')->get();
                        break;
                    case 'old':
                        $products = $products->orderBy('created_at', 'asc')->get();
                        break;
                    case 'cheepest':
                        $products = $products->orderBy('price', 'asc')->get();
                        break;
                    case 'expensive':
                        $products = $products->orderBy('price', 'desc')->get();
                }
            }
        }
        if($products->count() > 0){
            return view('user.search-not-found', compact('brands'));
        }
    }
}
