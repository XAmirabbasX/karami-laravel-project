<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('admin')['level'][1]==1){
            $brands = Brand::all();
            return view('admin.manageBrand',compact('brands'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('admin')['level'][0]==1){
            return view('admin.createBrand');
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $result = Brand::create($request->all());
        if ($result) {
            toastr()->success('درج برند با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('درج برند ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (session('admin')['level'][2]==1){
            $brand = Brand::find($id);
            return view('admin.editBrand',compact('brand'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $result = Brand::where('id', $id)->update([
            'title' => $request->input('title'),
        ]);
        if ($result) {
            toastr()->success('ویرایش برند با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('ویرایش برند ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Brand::destroy($id)) {
            toastr()->success('با موفقیت حذف شد');
        }else{
            toastr()->error('خطا در انجام عملیات');
        }
        return redirect()->back();
    }
    public function changeStatus(string $id){
        $brand = Brand::where('id', $id)->first();
        $brand->status = ($brand->status == 'active' ? 'inactive' : 'active');
        if ($brand->save()){
            toastr('وضعیت عوض شد');
            return redirect()->back();
        }
    }
}
