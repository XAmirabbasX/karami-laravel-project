<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('admin')['level'][7]==1){
            $trashedProducts = Product::onlyTrashed()->get();
            $products = Product::with(['category', 'brand'])->get();
            return view('admin.manageProduct', compact('products', 'trashedProducts'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('admin')['level'][6]==1){
            $brands = Brand::all();
            $categories = Category::whereNotNull('parent_id')->get();
            return view('admin.createProduct' , compact('brands', 'categories'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $result = Product::create($request->all());
        if ($result) {
            toastr()->success('درج محصول با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('درج محصول ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (session('admin')['level'][8]==1){
            $brands = Brand::all();
            $categories = Category::whereNotNull('parent_id')->get();
            $product = Product::find($id);
            return view('admin.editProduct', compact('product', 'brands', 'categories'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request){
        $product = Product::find($id);
        $result = $product->update($request->all());
        if ($result) {
            toastr('آپدیت موفق');
        }else{
            toastr('آپدیت ناموفق');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Product::destroy($id)){
            toastr('حذف موفق');
        }else{
            toastr()->error('خطا در انجام عملیات');
        }
        return redirect()->back();
    }

    public function restoreProduct(string $id){
        $trashedProduct = Product::onlyTrashed()->where('id', $id)->first();
        if ($trashedProduct->restore()) {
            toastr('بازگردانی موفق');
            return redirect()->back();
        };
    }
    public function restoreAllProducts(Request $request){
        $trashed_products = Product::onlyTrashed()->get();
        foreach ($trashed_products as $trashed_product) {
            $trashed_product->restore();
        }
        if ($trashed_products) {
            toastr()->success('باز گردانی با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('باز گردانی ناموفق');
            return redirect()->back();
        }
    }

    public function changeStatus(string $id){
        $product = Product::where('id', $id)->first();
        $product->status = ($product->status == 'active' ? 'inactive' : 'active');
        if ($product->save()){
            toastr('وضعیت عوض شد');
            return redirect()->back();
        }
    }
}
