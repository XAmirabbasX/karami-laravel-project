<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Cart;
use App\Models\Orderproducts;
use App\Models\Orders;
use App\Models\Product;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function goToPayment(){
        checkCart();
        $errors = [];
        $cartInfoForCheck = Cart::where('user_id', auth()->id())->with('product')->get();
        foreach ($cartInfoForCheck as $cartInfo){
            $product = $cartInfo->product;
            if($product->status == 'inactive'){
                $errors[] = ["محصول $product->title در حال حاضر غیر فعال است"];
                continue;
            }
            if($product->deleted_at != Null){
                $errors[] = ["محصول $product->title در حال حاضر وجود ندارد"];
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
                toastr()->error($error);
            }
            return redirect()->route('User.showPayment');
        }

        $databaseCart = Cart::with('product')->where('user_id', auth()->id())->get();
        $allPrice = 0;
        $amountPayable = 0;
        if (auth()->id()){
            foreach ($databaseCart as $item){
                $allPrice += $item->quantity * $item->product->price;
                $amountPayable += $item->product->price_discount ? $item->product->price_discount * $item->quantity : $item->product->price * $item->quantity;
            }
        }

        $response = zarinpal()
            ->merchantId('01df21de-68fa-497c-b103-d6c903811551') // تعیین مرچنت کد در حین اجرا - اختیاری
            ->amount($amountPayable) // مبلغ تراکنش
            ->request()
            ->description('transaction info') // توضیحات تراکنش
            ->callbackUrl('http://127.0.0.1:8000/callbackUrl') // آدرس برگشت پس از پرداخت
            ->mobile('') // شماره موبایل مشتری - اختیاری
            ->email('') // ایمیل مشتری - اختیاری
            ->send();

        if (!$response->success()){
            toastr()->error($response->error()->message());
            return redirect()->route('User.showPayment');
        }

// ذخیره اطلاعات در دیتابیس
        $address = Addresses::where('user_id', auth()->id())->where('is_default', 1)->first();

        DB::transaction(function () use ($address, $databaseCart, $allPrice, $amountPayable, $response){
            $createOrder = Orders::create([
                'user_id' => auth()->id(),
                'tracking_code' => generateTrackingCode(),
                'total_amount' => $allPrice,
                'amount_payable' => $amountPayable,
                'shipping_cost' => SHIPING_COST,
                'address_id' => $address->id,
                'pay_key' => $response->authority(),
            ]);

            foreach ($databaseCart as $item){
                Orderproducts::create([
                    'order_id' => $createOrder->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'price_discount' => $item->product->price_discount,
                ]);
            }
        });


// هدایت مشتری به درگاه پرداخت
        return $response->redirect();
    }

    public function callbackUrl(){
        $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        $status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال

        if ($status != 'NOK'){
            $response = zarinpal()
                ->merchantId('01df21de-68fa-497c-b103-d6c903811551') // تعیین مرچنت کد در حین اجرا - اختیاری
                ->amount(100)
                ->verification()
                ->authority($authority)
                ->send();

            if (!$response->success()) {
                return $response->error()->message();
            }

            $order_detail = Orders::where('pay_key', $authority)->with('order_products')->first()->update([
                'status' => 'paid'
            ]);

            //کم کردن از موجودی محصول
            foreach ($order_detail->order_products as $order_product){
                $product = Product::where('id', $order_product->product_id)->update([
                    'stock' => $product->stock - $order_product->quantity
                ]);
            }

            Cart::where('user_id', auth()->id())->delete();
            return view('user.payment-successfull', compact('order_detail'));
        }else{
            $order_detail = Orders::where('pay_key', $authority)->first();
            return view('user.payment-no-successfull', compact('order_detail'));
        }

    }
}
