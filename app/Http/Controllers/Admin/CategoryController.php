<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('admin')['level'][4]==1){
            $categories = Category::with('parent')->get();
            $trash_categories = Category::onlyTrashed()->with('parent')->get();
            return view('admin.manageCategory', compact('categories', 'trash_categories'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('admin')['level'][3]==1){
            $parent_categories = Category::whereNull('parent_id')->get();
            return view('admin.createCategory', compact('parent_categories'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $result = Category::create($request->all());
        if ($result) {
            toastr()->success('درج با موفقیت');
            return redirect()->back();
        }else{
            toastr()->success('درج ناموفق');
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
        if (session('admin')['level'][5]==1){
            $category = Category::find($id);
            $parent_categories = Category::where('parent_id', NULL)->get();
            return view('admin.editCategory', compact('category', 'parent_categories'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category_info = Category::find($id);
        $category_info->title = $request->input('title');
        $category_info->parent_id = $request->parent_id;

        if ($category_info->save()) {
            toastr()->success('ویرایش با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('ویرایش ناموفق');
            return redirect()->back();
        }
    }

    public function changestatus(string $id)
    {
        $category_info = Category::find($id);
        $category_info->status = $category_info->status == 'active' ? 'inactive' : 'active';

        if ($category_info->save()) {
            toastr()->success('ویرایش با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('ویرایش ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategories = Category::where('parent_id', $id)->get();
        foreach ($subcategories as $subcat) {
            Category::destroy($subcat->id);
        }
        $destroy_category = Category::destroy($id);
        if ($destroy_category) {
            toastr()->success('حذف با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('حذف ناموفق');
            return redirect()->back();
        }
    }

    public function restoreCategory(string $id){
        $categoryNeedToRestore = Category::onlyTrashed()->find($id);

        if ($categoryNeedToRestore->parent_id != NULL) {
            $parentCat = Category::onlyTrashed()->find($categoryNeedToRestore->parent_id);
            if ($parentCat) {
                $parentCat->restore();
            }
        }

        if ($categoryNeedToRestore->restore()) {
            toastr()->success('باز گردانی با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('باز گردانی ناموفق');
            return redirect()->back();
        }
    }

    public function restoreCategories(Request $request){
        $trash_categories = Category::onlyTrashed()->get();
        foreach ($trash_categories as $trash_category) {
            Category::onlyTrashed()->find($trash_category->id)->restore();
        }
        if ($trash_categories) {
            toastr()->success('باز گردانی با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('باز گردانی ناموفق');
            return redirect()->back();
        }
    }
}
