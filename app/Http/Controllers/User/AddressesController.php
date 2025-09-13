<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressesRequest;
use App\Models\Addresses;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    public function addAddressToDB(AddressesRequest $request){
        Addresses::where('user_id', Auth::id())->where('is_default', 1)->update(['is_default' => 0]);
        $addAddres = Addresses::create([
            'user_id' => Auth::id(),
            'name' => $request['name'],
            'phone' => $request['phoneNumber'],
            'city_id' => $request['city'],
            'address' => $request['address'],
            'postcode' => $request['postCode'],
        ]);
        if ($addAddres) {
            toastr()->success('ثبت آدرس موفق');
            return redirect()->back();
        }else{
            toastr()->error('ثبت آدرس ناموفق');
            return redirect()->back();
        }
    }

    public function deleteAddress(string $address_id){
        if (Addresses::destroy($address_id)){
            toastr()->success('حذف آدرس موفقیت آمیز بود');
        }else{
            toastr()->error('عملیات نا موفق');
        }
        Addresses::where('user_id', Auth::id())->where('is_default', 0)->update(['is_default' => 1]);
        return redirect()->back();
    }

    public function editAddress(string $address_id){
        Addresses::where('user_id', Auth::id())->where('is_default', 1)->update(['is_default' => 0]);
        if (Addresses::find($address_id)->update(['is_default' => 1])){
            toastr()->success('آدرس به پیش فرض تغییر کرد');
        }else{
            toastr()->error('عملیات ناموفق');
        }
        return redirect()->back();
    }
}
