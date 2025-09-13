@extends('user.view')
@section('content')
    <!--Main:start-->
    <main class="container mt-xxxx-large">
        <!--    Cart:start-->
        <div class="cart">
            <div class="tab-content p-3">
                <!--          Cart:start-->
                <div class="tab-pane fade show active text-center" id="cart">
                    <div class="row">
                        <!--                    Products In Cart:start-->
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9 border border-radius-xl">
                            <!--                        Cart Header:start-->
                            <div class="cart-header d-flex justify-content-between align-items-center my-4">
                                <p class="fw-bold">
                                    سبد خرید شما
                                    <span class="fs-8 gray-600 d-block text-start">{{$cartCount}} کالا</span>
                                </p>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        <!--begin::Svg Icon-->
                                       <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" cx="12" cy="5" r="2"/>
                                                <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                <circle fill="#000000" cx="12" cy="19" r="2"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">حذف همه</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--                        Cart Header:end-->

                            <!--                        Cart Content:start-->
                            <div class="cart-content">
                                <!--                Shopping Cart Box:start-->
                                <div class="card shopping-cart-box border-0">
                                    <!--                    Cart Body:start-->
                                    <div class="card-body cartParent">
                                        <!--                    Shopping Cart Item:start-->
                                        @if(auth()->id())
                                            @foreach($cart as $product)
                                                <div class="shopping-cart-item py-3 border-bottom-gray-150">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3">
                                                            <!--                    Shopping Cart Item Right:start-->
                                                            <div class="shopping-cart-item-right me-3">
                                                                <img src="{{asset(!empty($product->images[0]) ? 'storage/'.$product->images[0]->src : 'storage/no-image-icon-vector-available.webp')}}" alt="image"
                                                                     class="object-contain">
                                                                <div class="shop-item-edit-box d-flex justify-content-between align-items-center px-3 pt-2 pb-1 border-radius-xl">
                                                                    <button onclick="updateQuantity('plus', {{$product->product->id}})" class="btn addition"><i class="text-danger fas fa-plus"></i></button>

                                                                    <span id="quantity-{{$product->product->id}}" class="fs-5">{{$product->quantity}}</span>

                                                                    <button onclick="updateQuantity('minus', {{$product->product->id}})" class="btn decrease"><i id="iconQyt" class="text-danger fas {{$product->quantity > 1 ? 'fa-minus' : 'fa-trash-alt'}}"></i></button>
                                                                </div>
                                                            </div>
                                                            <!--                    Shopping Cart Item Right:end-->
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 col-lg-8 col-xl-9 mt-4">
                                                            <!--                    Shopping Cart Item Left:start-->
                                                            <div class="shopping-cart-item-left text-start">
                                                                <h3 class="fs-6">{{$product->product->title}}</h3>
                                                                <span class="d-block mt-1 fs-8">
                                                                    <i class="far fa-check-circle text-success align-middle me-1"></i>
                                                                    موجود در انبار برگ شاپ
                                                                </span>
                                                                <span class="d-block mt-1 fs-8">
                                                                    <i class="fas fa-truck-moving gray-500 align-middle me-1"></i>
                                                                    آماده ارسال
                                                                </span>
                                                                <span class="fs-4 pt-3 d-block">
                                                                    <span id="product_price-{{$product->product_id}}">{{number_format($product->product->price * $product->quantity)}}</span> تومان
                                                                </span>
                                                            </div>
                                                            <!--                    Shopping Cart Item Left:end-->
                                                            <!--                    Shopping Cart Transfer To Next Cart:start-->
                                                            <!--                    Shopping Cart Transfer To Next Cart:end-->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($cart as $product)
                                                <div class="shopping-cart-item py-3 border-bottom-gray-150">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3">
                                                            <!--                    Shopping Cart Item Right:start-->
                                                            <div class="shopping-cart-item-right me-3">
                                                                <img src="{{asset('storage/'.$product->attributes->image)}}" alt="image"
                                                                     class="object-contain">
                                                                <div class="shop-item-edit-box d-flex justify-content-between align-items-center px-3 pt-2 pb-1 border-radius-xl">
                                                                    <button onclick="updateQuantity('plus', {{$product->id}})" class="btn addition"><i class="text-danger fas fa-plus"></i></button>

                                                                    <span id="quantity-{{$product->id}}" class="fs-5">{{$product->quantity}}</span>

                                                                    <button onclick="updateQuantity('minus', {{$product->id}})" class="btn decrease"><i id="iconQyt" class="text-danger fas {{$product->quantity > 1 ? 'fa-minus' : 'fa-trash-alt'}}"></i></button>
                                                                </div>
                                                            </div>
                                                            <!--                    Shopping Cart Item Right:end-->
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 col-lg-8 col-xl-9 mt-4">
                                                            <!--                    Shopping Cart Item Left:start-->
                                                            <div class="shopping-cart-item-left text-start">
                                                                <h3 class="fs-6">{{$product->name}}</h3>
                                                                <span class="d-block mt-1 fs-8">
                                                                <i class="far fa-check-circle text-success align-middle me-1"></i>
                                                                موجود در انبار برگ شاپ
                                                                </span>
                                                                                <span class="d-block mt-1 fs-8">
                                                                 <i class="fas fa-truck-moving gray-500 align-middle me-1"></i>
                                                                آماده ارسال
                                                                </span>
                                                                <span class="fs-4 pt-3 d-block">
                                                                    <span id="product_price-{{$product->id}}" class="productPrice">{{number_format($product->price * $product->quantity)}}</span> تومان
                                                                </span>
                                                            </div>
                                                            <!--                    Shopping Cart Item Left:end-->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <!--                    Shopping Cart Item:start-->
                                    </div>
                                    <!--                    Cart Body:end-->
                                </div>
                                <!--                Shopping Cart Box:end-->

                            </div>
                            <!--                        Cart Content:end-->
                        </div>
                        <!--                    Products In Cart:end-->

                        <!--                    Products Prices:start-->

                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-3">
                                <div class="cart-cal border border-radius-xl overflow-hidden">
                                    <!--                            All Prices:start-->
                                    <div class="all-price d-flex justify-content-between align-items-center mb-3 px-3 pt-2">
                                        <p class="fs-7 fw-bold">
                                            قیمت کالاها
                                            <span>({{$cartCount}})</span>
                                        </p>
                                        <p id="total_amount" class="fs-7 gray-600 fw-bold">
                                            {{number_format($allPrice)}}تومان
                                        </p>
                                    </div>
                                    <!--                            All Prices:end-->

                                    <!--                            All Prices Discounted:start-->
                                    <div class="all-price-discounted d-flex justify-content-between align-items-center mb-3 px-3 pt-2">
                                        <p class="fs-7 fw-bold">
                                            جمع سبد خرید
                                        </p>
                                        <p id="amount_payable" class="fs-7 gray-600 fw-bold">
                                            {{number_format($amountPayable)}} تومان
                                        </p>
                                    </div>
                                    <!--                            All Prices Discounted:end-->

                                    <!--                           Purchase:start-->
                                    <div class="purchase-profit d-flex justify-content-between align-items-center mb-3 px-3 pt-1">
                                        <p class="fs-7 fw-bold text-danger">
                                            سود شما از خرید
                                        </p>
                                        <p id="profit" class="fs-6 fw-bold text-danger">
                                            {{number_format($profit)}} تومان
                                        </p>
                                    </div>
                                    <!--                            Purchase:end-->

                                    <!--                            Checkout Btn:start-->
                                    <div class="d-grid gap-2 p-3">
                                        @if(auth()->id())
                                            <a href="{{route('User.showShipping')}}" class="btn custom-btn-danger border-radius-xl">ثبت سفارش</a>
                                        @else
                                            <a href="{{route('login')}}" class="btn custom-btn-danger border-radius-xl">نیاز به ورود است</a>
                                        @endif
                                    </div>
                                    <!--                            Checkout Btn:end-->
                                </div>
                                <p class="text-start mt-3 fs-8">
                                    هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند
                                </p>
                            </div>

                        <!--                    Products Prices:end-->
                    </div>
                </div>
                <!--          Cart:end-->
            </div>
        </div>
        <!--    Cart:end-->
    </main>
    <!--Main:end-->
@endsection
