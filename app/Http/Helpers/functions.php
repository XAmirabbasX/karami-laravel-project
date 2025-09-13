<?php

use App\Models\Cart;

function generateTrackingCode($lentgh = 15) {
    $chars = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    shuffle($chars);
    $string_version = implode($chars);
    $text2 = substr($string_version, 0, $lentgh);

    return $text2;
}

function addToCartWhenLogin(){
    $userCart = Cart::where('user_id', auth()->id())->get();
    $sessionCart = session('cartid') ? \Cart::session(session('cartid'))->getContent() : null;
    if ($sessionCart != null) {
        $hasrun = false;
        foreach ($sessionCart as $item) {
            foreach ($userCart as $productCart) {
                if ($productCart->product_id == $item->id) {
                    $productCart->quantity += $item->quantity;
                    $productCart->save();
                    $hasrun = true;
                }
            }

            if (!$hasrun) {
                Cart::create([
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        session()->forget('cartid');
    }
}
function checkCart() {
    if(!auth()->id()){
        toastr()->warning('You must be logged in!');
        return redirect()->route('index');
    }
    if (empty(Cart::where('user_id', auth()->id())->get())) {
        toastr()->warning('Your cart is empty!');
        return redirect()->route('index');
    }
    if (empty(\App\Models\Addresses::where('user_id', auth()->id())->where('is_default', 1)->first())) {
        toastr()->warning('آدرسی برای ارسال ندارید!');
        return redirect()->route('index');
    }
}
