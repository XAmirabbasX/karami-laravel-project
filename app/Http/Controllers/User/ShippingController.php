<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{

    public function showShipping(){
        checkCart();
        if(auth()->id()){
            $user_addresses = Addresses::where('user_id', auth()->id())->with('city')->get();
            if (count($user_addresses) == 0) {
                return redirect()->route('user.showProfileAddresses', auth()->id());
            }
            $user_address_default = null;
            foreach($user_addresses as $address){
                if($address->is_default){
                    $user_address_default = $address;
                }
            }

            $databaseCart = Cart::with('product' , 'images')->where('user_id', auth()->id())->get();
            $allPrice = 0;
            $amountPayable = 0;
            $cartCount = count($databaseCart);
            if (auth()->id()){
                foreach ($databaseCart as $item){
                    $allPrice += $item->quantity * $item->product->price;
                    $amountPayable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
                }
            }
            $profit = $allPrice - $amountPayable;

            return view('user.shipping', compact('user_addresses', 'user_address_default', 'databaseCart', 'allPrice', 'amountPayable', 'cartCount', 'profit'));
        }
    }

    public function showPayment(){
        checkCart();
        $errors = [];
        $cartInfoForCheck = Cart::where('user_id', auth()->id())->with('product')->get();
        foreach ($cartInfoForCheck as $cartInfo){
            $product = $cartInfo->product;
            if($product->deleted_at != Null){
                $errors[] = ["محصول $product->title در حال حاضر وجود ندارد"];
                continue;
            }
            if($product->status == 'inactive'){
                $errors[] = ["محصول $product->title در حال حاضر غیر فعال است"];
                continue;
            }
            if ($product->stock < $cartInfo->quantity){
                $cartInfo->update([
                    'quantity' => $product->stock
                ]);
                $errors[] = ["تعداد محصول $product->title در سبد شما بروزرسانی شد"];
            }
        }

        if (!empty($errors)){
            foreach ($errors as $error){
                toastr()->error($error[0]);
            }
            return redirect()->route('User.cart');
        }

        $databaseCart = Cart::with('product' , 'images')->where('user_id', auth()->id())->get();
        $allPrice = 0;
        $amountPayable = 0;
        $cartCount = count($databaseCart);
        if (auth()->id()){
            foreach ($databaseCart as $item){
                $allPrice += $item->quantity * $item->product->price;
                $amountPayable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
            }
        }
        $profit = $allPrice - $amountPayable;

        return view('user.payment', compact('cartInfoForCheck', 'allPrice', 'amountPayable', 'cartCount', 'profit'));
    }
    public function changeAddress(Request $request){
        $user_addresses = Addresses::where('user_id', auth()->id())->get();
        foreach ($user_addresses as $address){
            if($address->is_default){
                $address->update([
                    'is_default' => false
                ]);
            }
            if ($address->id == $request->address_id){
                $address->update([
                    'is_default' => true
                ]);
            }
        }
        toastr()->success('آدرس ارسالی عوض شد');
        return redirect()->back();
    }
}
