<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($product_id){

        $cartid = auth()->id() ?? session()->getId();
        session(['cartid' => $cartid]);

        if ($cartid == auth()->id()){
            $productInCart = Cart::where('product_id', $product_id)->where('user_id', auth()->id())->first();
            if ($productInCart){
                $productInCart->quantity += 1;
                $productInCart->save();
                toastr()->success('به تعداد این محصول در سبد شما اضافه شد');
            }else{
                Cart::where('product_id', $product_id)->create([
                    'product_id' => $product_id,
                    'quantity' => 1,
                    'user_id' => auth()->id(),
                ]);
                toastr()->success('این محصول به سبد شما اضافه شد');
            }

        }else{
            $product = Product::with('images')->find($product_id);
            if (\Cart::session($cartid)->has($product_id)) {
                \Cart::session($cartid)->update($product_id,[
                    'quantity' => 1,
                ]);
                toastr()->success('به تعداد این محصول در سبد شما اضافه شد');
                return redirect()->back();
            }

            $final_price = $product->price_discount > 0 ? $product->price_discount: $product->price;
            \Cart::session($cartid)->add(array(
                'id' => $product_id,
                'name' => $product->title,
                'price' => $final_price,
                'quantity' => 1,
                'attributes' => [
                    'image' => !empty($product->images[0]) ? $product->images[0]->src : 'no-image-icon-vector-available.webp',
                    'original_price' => $product->price,
                    'price_discount' => $product->price_discount
                ]
            ));
            toastr()->success('این محصول به سبد شما اضافه شد');
        }
        return redirect()->back();
    }

    public function showCart(){
        $databaseCart = Cart::with('product' , 'images')->where('user_id', auth()->id())->get();
        $sessionCart = session('cartid') ? \Cart::session(session('cartid'))->getContent() : null;
        if (($sessionCart != null && count($sessionCart) > 0) or count($databaseCart) > 0){
            $cart = !empty($sessionCart) && count($sessionCart) > 0 ? $sessionCart : $databaseCart;
            $allPrice = 0;
            $amountPayable = 0;
            $cartCount = count($cart);
            if (auth()->id()){
                foreach ($cart as $item){
                    $allPrice += $item->quantity * $item->product->price;
                    $amountPayable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
                }
            }else{
                $amountPayable += \Cart::getTotal();
                $allPrice += \Cart::session(session('cartid'))->getContent()->sum(function ($item){
                    return $item->quantity * $item->attributes->original_price;
                });
            }
            $profit = $allPrice - $amountPayable;

            return view('user.cart', compact('cart', 'cartCount', 'profit', 'allPrice', 'amountPayable'));
        }else{
            return view('user.empty-cart');
        }
    }

    public function plus($product_id){
        if (auth()->id()){
            $product = Cart::where('product_id', $product_id)->where('user_id', auth()->id())->with('product')->first();
            if ($product->product->stock > $product->quantity){
                $product->quantity += 1;
                $product->save();

                $product_price = $product->product->price * $product->quantity;
                $total_amount = 0;
                $amount_payable = 0;
                $cart = Cart::where('user_id', auth()->id())->with('product')->get();
                foreach ($cart as $item){
                    $total_amount += $item->product->price * $item->quantity;
                    $amount_payable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
                }

                return response()->json([
                    'status' => true,
                    'text' => 'به تعداد محصول در سبد اضافه شد',
                    'total_amount' => number_format($total_amount).'تومان',
                    'product_price' => number_format($product_price),
                    'amount_payable' => number_format($amount_payable).'تومان',
                    'quantity' => $product->quantity,
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'text' => 'موجودی محصول کافی نمیباشد'
                ]);
            }
        }else{
            $product = Product::findOrFail($product_id);
            $productSession = \Cart::session(session('cartid'))->get($product_id);
            if ($productSession->quantity < $product->stock){
                \Cart::session(session('cartid'))->update($product_id,[
                    'quantity' => 1,
                ]);
                $total_amount = \Cart::session(session('cartid'))->getContent()->sum(function ($item){
                    return $item->quantity * $item->attributes->original_price;
                });
                $amount_payable = \Cart::session(session('cartid'))->getContent()->sum(function ($item){
                    return $item->quantity * $item->price;
                });
                return response()->json([
                    'status' => true,
                    'text' => 'به تعداد محصول در سبد اضافه شد',
                    'total_amount' => number_format($total_amount).'تومان',
                    'product_price' => number_format($productSession->price * $productSession->quantity),
                    'amount_payable' => number_format($amount_payable).'تومان',
                    'quantity' => $productSession->quantity,
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'text' => 'موجودی محصول کافی نمیباشد'
                ]);
            }
        }
    }

    public function minus($product_id){
        if (auth()->id()){
            $product = Cart::where('product_id', $product_id)->where('user_id', auth()->id())->with('product')->first();
            if ($product->quantity > 1){
                $product->quantity -= 1;
                $product->save();

                $product_price = $product->product->price_discount ? $product->product->price_discount * $product->quantity : $product->product->price * $product->quantity;
                $total_amount = 0;
                $amount_payable = 0;
                $cart = Cart::where('user_id', auth()->id())->with('product')->get();
                foreach ($cart as $item){
                    $total_amount += $item->product->price * $item->quantity;
                    $amount_payable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
                }

                return response()->json([
                    'status' => true,
                    'text' => 'از تعداد محصول در سبد کم شد',
                    'total_amount' => number_format($total_amount).'تومان',
                    'product_price' => number_format($product_price),
                    'amount_payable' => number_format($amount_payable).'تومان',
                    'quantity' => $product->quantity,
                ]);
            }else{
                $product->delete();
                return response()->json([
                    'status' => True,
                    'text' => 'محصول از سبد حذف شد',
                    'quantity' => 0,
                ]);
            }
        }else{
            $productSession = \Cart::session(session('cartid'))->get($product_id);
            if ($productSession->quantity > 1){
                \Cart::session(session('cartid'))->update($product_id,[
                    'quantity' => -1,
                ]);
                $total_amount = \Cart::session(session('cartid'))->getContent()->sum(function ($item){
                    return $item->quantity * $item->attributes->original_price;
                });
                $amount_payable = \Cart::session(session('cartid'))->getContent()->sum(function ($item){
                    return $item->quantity * $item->price;
                });
                return response()->json([
                    'status' => true,
                    'text' => 'از تعداد محصول در سبد کم شد',
                    'total_amount' => number_format($total_amount).'تومان',
                    'product_price' => number_format($productSession->price * $productSession->quantity),
                    'amount_payable' => number_format($amount_payable).'تومان',
                    'quantity' => $productSession->quantity,
                    'profit' => number_format($total_amount - $amount_payable)
                ]);
            }else{
                \Cart::session(session('cartid'))->remove($product_id);
                return response()->json([
                    'status' => True,
                    'text' => 'محصول از سبد حذف شد',
                    'quantity' => 0,
                ]);
            }
        }
    }
}
