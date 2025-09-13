@extends('user.viewShipping')
@section('content')
    <!--Main:start-->
    <main class="container">
        <div class="payment">
            <!--    Payment Header:start-->
            <div class="payment-header border-radius-xl my-3">
                <!--            Payment Header Logo:start-->
                <a href=""><img src="{{asset('assets/img/logo.png')}}" alt="" class="payment-img d-block mx-auto my-3"></a>
                <!--            Payment Header Logo:end-->

                <!--            Payment Timeline:start-->
                <div class="payment-timeline d-flex justify-content-center align-items-baseline my-3">
                    <a href="{{route('User.cart')}}" class="text-danger basket mx-3">
                        <i class="fa fa-shopping-cart rotate-3d"></i>
                        سبد خرید
                    </a>
                    <a href="{{route('User.showShipping')}}"
                       class="text-danger mx-3 shipping d-flex justify-content-between align-items-center">
                        <p class="fs-5">
                            <i class="fa fa-truck rotate-3d"></i>
                            <span>زمان و نحوه ارسال</span>
                        </p>
                    </a>
                    <span class="text-secondary mx-3 pay d-flex justify-content-between align-items-center">
                    <i class="fa fa-credit-card pe-2"></i>
                    <span>پرداخت</span>
                </span>
                </div>
                <!--            Payment Timeline:end-->
            </div>
            <!--    Payment Header:end-->

            <!--    Payment Details:start-->
            <div class="payment-details cart">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                        <!--                    Payment Address:start-->
                        <div class="payment-address d-flex justify-content-between align-items-center border border-radius-xl p-3">
                            <div class="address-details">
                                <span class="fs-8">آدرس تحویل سفارش</span>
                                <p class="fw-bold my-2">
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{$user_address_default->city->province->name . ' ,' . $user_address_default->city->name . ' ,' . $user_address_default->address}}
                                </p>
                                <span class="fs-7">{{$user_address_default->name}}</span>
                            </div>
                            <a href="" class="text-info fs-7" data-bs-toggle="modal" data-bs-target="#selectAddress">
                                تغییر | ویرایش
                                <i class="fa fa-angle-left"></i>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="selectAddress">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">انتخاب آدرس</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-grid gap-2 insert-new-address-btn border-bottom-gray-150">
                                                <a href="" class="btn text-start fw-bold">
                                                    <i class="fa fa-map-marker-alt pe-2"></i>
                                                    ثبت آدرس جدید
                                                    <i class="fa fa-angle-left float-end align-middle py-2"></i>
                                                </a>
                                            </div>
                                            <div class="current-addresses">
                                                <form method="post" action="{{route('User.changeAddress')}}" class="px-2">
                                                    @csrf
                                                    @foreach($user_addresses as $user_address)
                                                        <div class="mb-4 border-bottom-gray-150 py-3">
                                                            <input value="{{$user_address->id}}" class="form-check-input" type="radio" name="address_id" id="city" {{$user_address_default->id == $user_address->id ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="city">
                                                                {{$user_address->city->name.', '. $user_address->address}}
                                                                <span class="d-block py-3 fw-lighter gray-600">
                                                                    <i class="fa fa-envelope"></i> {{$user_address->phone}}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <button type="submit" class="btn btn-primary">انتخاب کردن</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                    Payment Address:end-->

                        <!--                    Payment Transfer Time:start-->
                        <div class="payment-transfer-time border border-radius-xl mt-3 p-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="fa fa-truck rotate-3d text-danger fs-4"></i>
                                <div class="ms-3">
                                <span class="fw-bold">ارسال عادی
                                    <span class="badge bg-gray-500 border-radius-xl">2 کالا</span>
                                </span>
                                    <p class="fs-8">1 روز</p>
                                </div>
                            </div>

                            <!--                        Payment Products:start-->
                            <div class="payment-products mt-4">
                                <div class="row">

                                    <!--                                Payment Product Item:start-->
                                    @foreach($databaseCart as $product)
                                        <div class="col-3 col-xl-2">
                                            <!--                                    Payment Product Image:start-->
                                            <div class="payment-products-image position-relative">
                                                <img src="{{asset(!empty($product->images[0]) ? 'storage/'.$product->images[0]->src : 'storage/no-image-icon-vector-available.webp')}}" alt="" class="object-contain">
                                                <p class="badge bg-gray-400 position-absolute bottom-0">{{$product->quantity}}</p>
                                            </div>
                                            <!--                                    Payment Product Image:end-->
                                        </div>
                                    @endforeach
                                    <!--                                Payment Product Item:end-->
                                </div>
                            </div>
                            <!--                        Payment Products:end-->

                        </div>
                        <!--                    Payment Transfer Time:end-->
                        <a href="{{route('User.cart')}}" class="text-info mt-3 d-block fs-7">بازگشت به سبد خرید</a>

                    </div>

                    <!--                    Products Prices:start-->
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-3">
                        <div class="cart-cal border border-radius-xl overflow-hidden">
                            <!--                            All Prices:start-->
                            <div class="all-price d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                                <p class="fs-7 fw-bold">
                                    قیمت کالاها
                                    <span>({{$cartCount}})</span>
                                </p>
                                <p class="fs-7 gray-600 fw-bold">
                                    {{number_format($allPrice)}} تومان
                                </p>
                            </div>
                            <!--                            All Prices:end-->

                            <!--                            All Prices Discounted:start-->
                            <div class="all-price-discounted d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                                <p class="fs-7 fw-bold">
                                    جمع سبد خرید
                                </p>
                                <p class="fs-7 gray-600 fw-bold">
                                    {{number_format($amountPayable)}} تومان
                                </p>
                            </div>
                            <!--                            All Prices Discounted:end-->

                            <!--                           Purchase:start-->
                            <div class="purchase-profit d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                                <p class="fs-7 fw-bold text-danger">
                                    سود شما از خرید
                                </p>
                                <p class="fs-6 fw-bold text-danger">
                                    {{number_format($profit)}} تومان
                                </p>
                            </div>
                            <!--                            Purchase:end-->

                            <!--                            Checkout Btn:start-->
                            <div class="d-grid gap-2 p-3">
                                <form action="{{route('User.showPayment')}}">
                                    @csrf
                                    <button class="btn custom-btn-danger border-radius-xl">ثبت سفارش</button>
                                </form>
                            </div>
                            <!--                            Checkout Btn:end-->

                            <!--                            Cart Score:start-->
                            <div class="product-score d-flex justify-content-between align-items-center bg-gray-200 p-3">
                                <div>
                                    <img src="{{asset('assets/img/club-point.svg')}}" alt="">
                                    <span class="fs-7">  برگ کلاب</span>
                                </div>
                                <p>
                                    <span class="fw-bold">150</span>
                                    <span class="fs-8">امتیاز</span>
                                </p>
                            </div>
                            <!--                            Cart Score:end-->
                        </div>
                        <p class="text-start mt-3 fs-8">
                            هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند
                        </p>
                    </div>
                    <!--                    Products Prices:end-->
                </div>
            </div>
            <!--    Payment Details:end-->
        </div>
    </main>
    <!--Main:end-->
@endsection
