<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Cities;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Provinces;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::with('images')
            ->where('status', 'active')
            ->where('deleted_at', NULL)->orderBy('created_at', 'asc')->get();
        return view('user.index', compact('products'));
    }

    public function showProfileInfo(string $id){
        $user = User::with('address.city.province')->where('id', $id)->first();
        return view('user.profile.user-dashboard', compact('user'));
    }

    public function showProfileAddresses(string $id){
        $provinces = Provinces::all();
        $user = User::with('addresses.city.province')->find($id);
        return view('user.profile.user-addresses', compact('user', 'provinces'));
    }

    public function getCitiesByProvinceId(Request $provinceId){
        $cities = Cities::where('province_id', (int)implode($provinceId->all()))->get();
        $html = '';
        foreach ($cities as $city){
            $html .= "<option value='$city->id'>$city->name</option>";
        }
        return response()->json([
            'status' => True,
            'cities' => $html
        ]);
    }

    public function orderDetails(string $order_tracking){
        $id = auth()->id();
        $user = User::find($id);
        $order = Orders::where('tracking_code', $order_tracking)->where('user_id', $id)->with('order_products.product.images', 'address')->firstOrFail();
        return view('user.profile.user-orders-details', compact('order', 'user'));
    }

    public function userOrders(){
        $id = auth()->id();
        $user = User::find($id);
        $orders = Orders::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('user.profile.user-orders', compact('orders', 'user'));
    }

    public function userInfos(){
        $id = auth()->id();
        $user = User::find($id);
        return view('user.profile.user-manage-profile', compact('user'));
    }

    public function addUserInfo(UserRequest $request){
        $update = User::find(auth()->id())->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        if ($update){
            toastr()->success('ویرایش موفق');
        }else{
            toastr()->error('ویرایش ناموفق');
        }
        return redirect()->back();
    }
}
