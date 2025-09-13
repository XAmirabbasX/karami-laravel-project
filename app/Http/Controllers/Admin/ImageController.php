<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Photoproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function imageProduct(string $id){
        $product = Product::with('images')->find($id);
        return view('admin.imageProduct', compact('product'));
    }

    public function insertImageProduct(Request $request){
        $image = $request->file('images');
        $suffix = $image->extension();
        $name = md5(microtime()) . '.' . $suffix;
        $src = $image->storeAs('images/products', $name, 'public');

        $photos = Photo::create([
            'name' => $name,
            'src' => $src,
            'suffix' => $suffix,
        ]);

        if($photos){
           Photoproduct::create([
               'photo_id' => $photos->id,
               'product_id' => $request->product_id,
           ]);
        }
    }

    public function deleteImageProduct(string $id){
        $photo = Photo::find($id);
        if (storage::disk('public')->exists($photo->src)){
            storage::disk('public')->delete($photo->src);
        }

        $result1 = $photo->delete();
        $result2 = Photoproduct::where('photo_id', $id)->delete();
        if ($result1 and $result2){
            toastr()->success('حذف موفق');
            return redirect()->back();
        }else{
            toastr()->success('حذف ناموفق');
            return redirect()->back();
        }
    }

    public function deleteAllImagesProduct(string $id){
        $hasRun = false;
        $productImage = Photoproduct::where('product_id', $id)->get();
        foreach($productImage as $image){
            $image->delete();
            $imgInPhotos = Photo::find($image->photo_id);
            if (storage::disk('public')->exists($imgInPhotos->src)) {
                storage::disk('public')->delete($imgInPhotos->src);
            }
            $imgInPhotos->delete();
            $hasRun = true;
        }
        if($hasRun){
            toastr('حذف موفق');
            return redirect()->back();
        }else{
            toastr('حذف ناموفق');
            return redirect()->back();
        }
    }
}
