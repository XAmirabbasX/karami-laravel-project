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
                       class="text-danger basket mx-3 shipping d-flex justify-content-between align-items-center">
                        <p class="fs-6">
                            <i class="fa fa-truck rotate-3d"></i>
                            <span>زمان و نحوه ارسال</span>
                        </p>
                    </a>
                    <a href="{{route('User.showPayment')}}"
                       class="text-danger shipping mx-3 d-flex justify-content-between align-items-center">
                        <i class="fa fa-credit-card pe-2"></i>
                        <span>پرداخت</span>
                    </a>
                </div>
                <!--            Payment Timeline:end-->
            </div>
            <!--    Payment Header:end-->

            <!--    Payment Details:start-->
            <div class="payment-details cart">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                        <!--                    Payment Method:start-->
                        <div class="payment-methods border border-radius-xl p-3 mb-3">
                            <h2 class="fs-5 fw-bold">انتخاب روش پرداخت</h2>
                            <div class="payment-methods mt-4">
                                <form action="">
                                    <div class="mb-4 border-bottom-gray-150 pb-3">
                                        <input class="form-check-input" type="radio" name="payMethod" id="wallet" checked>
                                        <label class="form-check-label fw-bold" for="wallet">
                                            <i class="fa fa-wallet fs-3 px-2 gray-500"></i>
                                            درگاه پرداخت
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--                    Payment Method:end-->


                        <!--                    Payment Address:start-->
                        <div class="border border-radius-xl p-3 mb-4">
                            <div>
                                <h2 class="fs-5 fw-bold mb-4">خلاصه سفارش</h2>
                                <p class="fw-bold my-2">
                                    <i class="fa fa-truck rotate-3d text-danger"></i>
                                    <span class="px-1">
                                    یک شنبه 20 فروردین -
                                </span>
                                    <span class="px-1">
                                    بازه 9 - 11
                                </span>
                                    <span class="badge bg-gray-500">
                                    2 کالا
                                </span>
                                </p>
                                <span class="fs-7">ارسال عادی - {{SHIPING_COST}} تومان</span>
                            </div>
                        </div>
                        <!--                    Payment Address:end-->

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
                                    هزینه ارسال
                                </p>
                                <p class="fs-7 gray-600 fw-bold">
                                    {{number_format(SHIPING_COST)}} تومان
                                </p>
                            </div>
                            <!--                            All Prices Discounted:end-->

                            <!--                           Purchase:start-->
                            <div class="purchase-profit d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                                <p class="fs-7 fw-bold text-danger">
                                    قابل پرداخت
                                </p>
                                <p class="fs-6 fw-bold text-danger">
                                    {{number_format($amountPayable + SHIPING_COST)}} تومان
                                </p>
                            </div>
                            <!--                            Purchase:end-->

                            <!--                            Checkout Btn:start-->
                            <div class="d-grid gap-2 p-3">
                                <form action="{{route('User.goToPayment')}}">
                                    <button class="btn custom-btn-danger border-radius-xl">پرداخت</button>
                                </form>
                            </div>
                            <!--                            Checkout Btn:end-->

                        </div>
                    </div>
                    <!--                    Products Prices:end-->
                </div>
            </div>
            <!--    Payment Details:end-->
        </div>
    </main>
    <!--Main:end-->
@endsection
