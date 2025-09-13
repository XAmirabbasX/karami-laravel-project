@extends('user.view')
@section('content')
    <!--User Panel:start-->
    <main class="mt-xxxx-large">
        <!--    User Panel Wrapper:start-->
        <div class="user-panel-wrapper">
            <div class="container">
                <div class="row">
                    @include('user.profile.profileQuickAccessPanel')

                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                        <!--        User Panel Content:start-->
                        <div class="user-panel-content">

                            <!--                        User Panel Order Detail:start-->
                            <div class="user-panel-order-detail border border-radius-xl mb-3 mt-3">

                                <!--                            User Panel Order Detail Header:start-->
                                <div class="user-panel-order-detail-header p-3 border-bottom-gray-300 d-flex justify-content-between align-items-center">
                                    <p class="fw-bold">
                                        <a href="{{route('User.userOrders')}}">
                                            <i class="fa fa-arrow-right align-middle pe-2"></i>
                                        </a>
                                        جزئیات سفارش
                                    </p>
                                    <a href="" class="text-info fs-7">مشاهده فاکتور</a>
                                </div>
                                <!--                            User Panel Order Detail Header:end-->

                                <!--                            User Panel Order Detail Content:start-->
                                <div class="user-panel-order-detail-content p-3">
                                    <p class="gray-600 border-bottom-gray-150 pb-3 fw-lighter">
                                        کد پیگیری سفارش&nbsp;&nbsp;
                                        <span class="fw-bold">{{$order->tracking_code}}</span>
                                        <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                        تاریخ ثبت سفارش&nbsp;&nbsp;
                                        <span class="fw-bold">{{Morilog\Jalali\Jalalian::fromDateTime(new \DateTime($order->created_at))->format('Y/m/d')}}</span>
                                    </p>
                                    <p class="gray-600 border-bottom-gray-150 py-3 fw-lighter">
                                        تحویل گیرنده&nbsp;&nbsp;
                                        <span class="fw-bold">{{$order->address->name}}</span>
                                        <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                        شماره موبایل&nbsp;&nbsp;
                                        <span class="fw-bold">{{$order->address->phone}}</span>
                                        <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                        آدرس&nbsp;&nbsp;
                                        <span class="fw-bold">{{$order->address->address}}</span>
                                    </p>
                                    <p class="gray-600 border-bottom-gray-150 py-3 fw-lighter">
                                        مبلغ&nbsp;&nbsp;
                                        <span class="fw-bold">{{number_format($order->amount_payable)}} تومان</span>
                                        <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                        هزینه ارسال (براساس حجم و وزن)&nbsp;&nbsp;
                                        <span class="fw-bold">{{number_format(SHIPING_COST)}} تومان</span>
                                    </p>

                                    <div class="ordered-products">
                                        <p class="gray-600 py-3 fw-lighter">
                                            محصولات خریداری شده در این سفارش :
                                        </p>
                                        <div class="row">
                                            <div class="col-4 col-md-2 p-4">
                                                @foreach($order->order_products as $key => $order_product)
                                                    <div class="ordered-product-item position-relative">
                                                        <img src="{{asset(!empty($order_product->product->images[0]) ? 'storage/' . $order_product->product->images[0]->src : 'storage/no-image-icon-vector-available.webp')}}" alt="" class="object-contain img-fluid">
                                                        <span class="badge bg-gray-200 position-absolute top-0">{{'مقدار محصول:' . $order_product->quantity . ' ,کد محصول:' . $order_product->product->tracking_code}}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                            User Panel Order Detail Content:end-->
                            </div>
                            <!--                        User Panel Order Detail:end-->
                        </div>
                        <!--        User Panel Content:end-->
                    </div>
                </div>
            </div>
        </div>
        <!--    User Panel Wrapper:end-->
    </main>
    <!--User Panel:end-->
@endsection
