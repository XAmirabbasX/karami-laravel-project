@extends('user.view')
@section('content')
    <!--Main:start-->
    <main class="container mt-xxxx-large">
        <!--    BreadCrumb:start-->
        <nav class="my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-8"><a href="#">برگ شاپ</a></li>
                <li class="breadcrumb-item fs-8"><a href="#">کالای دیجیتال</a></li>
                <li class="breadcrumb-item fs-8"><a href="#">لپ تاپ</a></li>
            </ol>
        </nav>
        <!--    BreadCrumb:end-->

        <!--    Product Details:start-->
        <section class="product-details">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 position-relative">
                    @if(!empty($product->price_discount))
                        @php
                            $discount = true
                        @endphp
                        <!--                Product Incredible Offer:start-->
                        <div class="product-incredible-offer ms-5">
                            <img src="{{asset('assets/img/IncredibleOffer.svg')}}" alt="">
                            <div class="timer-wrapper">
                            </div>
                        </div>
                        <!--                Product Incredible Offer:end-->
                    @else
                        @php
                            $discount = false
                        @endphp
                    @endif

                    <!--                Product Action:start-->
{{--                    <div class="product-action">--}}
{{--                        <div class="add-to-favourites mb-3" data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                             title="افزودن به علاقه مندی ها">--}}
{{--                            <a href="" class="gray-700">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                     class="bi bi-heart" viewBox="0 0 16 16">--}}
{{--                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="share mb-3" data-bs-toggle="tooltip" data-bs-placement="right" title="اشتراک گذاری">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                 class="bi bi-share" viewBox="0 0 16 16" data-bs-toggle="modal"--}}
{{--                                 data-bs-target="#shareModal">--}}
{{--                                <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>--}}
{{--                            </svg>--}}

{{--                            <!-- Modal -->--}}
{{--                            <div class="modal fade" id="shareModal" tabindex="-1">--}}
{{--                                <div class="modal-dialog modal-dialog-centered">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title fw-bold fs-6" id="exampleModalLabel">اشتراک گذاری</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <p class="text-center fw-bold fs-7">این کالا را با دوستان خود به اشتراک--}}
{{--                                                گذارید!</p>--}}
{{--                                            <div class="d-grid gap-2 mt-2">--}}
{{--                                                <a href="" class="btn btn-outline-secondary border-radius-xl fs-7">--}}
{{--                                                    <i class="fa fa-copy align-middle pe-2"></i>--}}
{{--                                                    کپی کردن لینک--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="row mt-3 border-bottom-gray-300 pb-3">--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="d-grid gap-2 mt-2">--}}
{{--                                                        <a href=""--}}
{{--                                                           class="btn custom-btn-success py-2 border-radius-xl fs-7">--}}
{{--                                                            <i class="fab fa-whatsapp align-middle pe-2"></i>--}}
{{--                                                            واتس اپ--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="d-grid gap-2 mt-2">--}}
{{--                                                        <a href=""--}}
{{--                                                           class="btn custom-btn-primary py-2 border-radius-xl fs-7">--}}
{{--                                                            <i class="fab fa-twitter align-middle pe-2"></i>--}}
{{--                                                            تویتر--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <div class="d-grid gap-2 mt-2">--}}
{{--                                                        <a href="" class="btn custom-btn-info py-2 border-radius-xl fs-7">--}}
{{--                                                            <i class="fab fa-facebook align-middle pe-2"></i>--}}
{{--                                                            فیسبوک--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="discount-code d-flex justify-content-between align-items-center p-4">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                                                        <div class="discount-detail">--}}
{{--                                                            <p class="fw-bold fs-6">کد تخفیف شما</p>--}}
{{--                                                            <p class="fs-7">--}}
{{--                                                                کد را برای دوستان خود بفرستید و پس از--}}
{{--                                                                اولین خرید آنها، کد تخفیف و امتیاز بگیرید!--}}
{{--                                                            </p>--}}
{{--                                                            <a href="" class="btn btn-outline-danger mt-3">--}}
{{--                                                                <i class="fa fa-percent pe-2 fa-xs"></i>--}}
{{--                                                                دریافت کد تخفیف--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                                                        <div class="discount-img mt-3 text-center">--}}
{{--                                                            <img src="{{asset('assets/img/share-modal.svg')}}" alt="" title="">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="notification mb-3" data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                             title="اطلاع رسانی شگفت انگیز">--}}
{{--                            <a href="" class="gray-700">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                     class="bi bi-bell" viewBox="0 0 16 16">--}}
{{--                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="compare mb-3" data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                             title="افزودن به لیست مقایسه">--}}
{{--                            <a href="" class="gray-700">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                     class="bi bi-plus" viewBox="0 0 16 16">--}}
{{--                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--                Product Action:end-->

                    <!--            Product Images:start-->
                    <div class="product-images">
                        <img class="xzoom img-fluid" src="{{asset(!empty($product->images[0]) ? 'storage/'.$product->images[0]->src : 'storage/no-image-icon-vector-available.webp')}}"
                             xoriginal="assets/img/single-product-1.jpg"/>

                        <div class="xzoom-thumbs mt-2">
                            @foreach($product->images as $img)
                                <a href="{{asset('storage/'.$img->src)}}">
                                    <img class="xzoom-gallery" src="{{asset('storage/'.$img->src)}}"
                                         xpreview="assets/img/single-product-1.jpg">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!--            Product Images:end-->

                </div>

                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <!--                Product Details:start-->
                    <div class="product-details">
                        <!--                    Product Title:start-->
                        <h1 class="fs-5 fw-bold">{{$product->title}}</h1>
                        <span class="gray-400 en-title d-block pb-1 fs-7">{{$product->english_title}}</span>
                        <!--                    Product Title:end-->

                        <div class="row mt-1">

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7">
                                    <!--                            Product Details Right:start-->
                                    <div class="product-details-right">
                                        <div class="product-attr my-4">
                                            @if(!empty($product->features))
                                                <p class="fs-5 fw-bold mb-2">ویژگی ها</p>
                                                {!! $product->features !!}
                                            @endif
                                            <p class="mt-4 gray-600">کد محصول : <span>{{$product->tracking_code}}</span></p>
                                        </div>
                                    </div>
                                    <!--                            Product Details Right:end-->
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                                <!--                            Product Details Right:start-->

                                <div class="product-details-left p-3 border-radius-xl">
                                    <h3 class="fs-6 fw-bold">فروشنده</h3>
                                    <!--                                Vendor Info:start-->
                                    <div class="vendor-info position-relative">
                                        <div class="vendor-icon d-inline">
                                          <span class="svg-icon pe-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor"
                                                 class="bi bi-shop" viewBox="0 0 16 16"> <path
                                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"></path> </svg>
                                        </span>
                                        </div>
                                        <div class="vendor-detail d-inline">
                                            <p class="d-inline fs-7">

                                                <span>برگ شاپ</span>
                                            </p>
                                            <span class="verified-vendor">
                                            <i class="fa fa-check-circle ps-1"></i>
                                        </span>

                                        </div>

                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                    <!--Vendor Info:end-->

                                    <!--                                        Stock:start-->
                                    <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                        <span class="fw-bold btn fs-7">
                                            <i class="fa fa-box pe-3 align-middle text-info"></i>
                                            @if($product->stock>0)
                                                موجود در انبار فروش برگشاپ
                                            @else
                                                محصول موجود نیست
                                            @endif
                                            <i class="fa fa-angle-left ps-3"></i>
                                        </span>
                                    </div>
                                    <!--                                        Stock:end-->

                                    <!--                                Product Price:start-->
                                    @if($product->stock>0)
                                        <div class="price py-2 d-flex justify-content-between align-items-center">
                                            <p class="gray-600 fs-7">
                                                <i class="fa fa-info-circle align-middle pe-1" data-bs-toggle="tooltip"
                                                   data-bs-placement="bottom" title=""
                                                   data-bs-original-title="این کالا توسط فروشنده آن قیمت گذاری شده است."></i>
                                                قیمت فروشنده
                                            </p>
                                            <div>
                                                <span class="fw-bold pe-1 fs-4">{{$discount === true ? number_format($product->price_discount) : number_format($product->price)}}</span>
                                                تومان
                                            </div>
                                        </div>
                                        <!--                                Product Price:end-->

                                        <div class="d-grid gap-2 mt-2">
                                            <a href="{{route('User.addToCart', $product->id)}}" class="btn btn-danger border-radius-xl fs-6">افزودن به سبد خرید</a>
                                        </div>
                                    @else
                                        <div>
                                            <span class="fw-bold pe-1 fs-4">محصول موجود نیست</span>
                                        </div>
                                    @endif

                                </div>
                                <!--                            Product Details Right:end-->
                            </div>
                        </div>
                    </div>
                    <!--                Product Details:end-->
                </div>
            </div>
        </section>
        <!--    Product Details:end-->

        <!--    Product Attr:start-->
        <div class="product-attr border-top custom-box-shadow-s-1-bottom my-5">
            <!--            Slider:start-->
            <div class="swiper productAttr">
                <div class="swiper-wrapper">

                    <!--            Attr Item:start-->
                    <div class="swiper-slide">
                        <div class="brands-item d-flex justify-content-center align-items-center">
                            <p class=" fs-8 gray-500">
                                <img src="{{asset('assets/img/cash-on-delivery%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                                امکان پرداخت در محل
                            </p>
                        </div>
                    </div>
                    <!--            Attr Item:end-->

                    <!--            Attr Item:start-->
                    <div class="swiper-slide">
                        <div class="brands-item d-flex justify-content-center align-items-center">
                            <p class=" fs-8 gray-500">
                                <img src="{{asset('assets/img/support%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                                24 ساعته، 7 روز هفته
                            </p>
                        </div>
                    </div>
                    <!--            Attr Item:end-->

                    <!--            Attr Item:start-->
                    <div class="swiper-slide">
                        <div class="brands-item d-flex justify-content-center align-items-center">
                            <p class=" fs-8 gray-500">
                                <img src="{{asset('assets/img/days-return%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                                هفت روز ضمانت بازگشت کالا
                            </p>
                        </div>
                    </div>
                    <!--            Attr Item:end-->

                    <!--            Attr Item:start-->
                    <div class="swiper-slide">
                        <div class="brands-item d-flex justify-content-center align-items-center">
                            <p class=" fs-8 gray-500">
                                <img src="{{asset('assets/img/express-delivery%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                                امکان تحویل اکسپرس
                            </p>
                        </div>
                    </div>
                    <!--            Attr Item:end-->

                    <!--            Attr Item:start-->
                    <div class="swiper-slide">
                        <div class="brands-item d-flex justify-content-center align-items-center">
                            <p class=" fs-8 gray-500">
                                <img src="{{asset('assets/img/original-products%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                                ضمانت اصل بودن کالا
                            </p>
                        </div>
                    </div>
                    <!--            Attr Item:end-->

                </div>
            </div>
            <!--            Slider:end-->
        </div>
        <!--    Product Attr:end-->

        <!--    Product Sellers:start-->
        <section class="product-sellers">
            <h2 class="fs-5 mb-3"><span>فروشندگان</span> این کالا</h2>

            <!--        Product Sellers Item:start-->
            <div class="product-sellers-item">
                <div class="row py-4 d-flex justify-content-between align-items-center border-radius-xl">
                    <!--            Seller Name:start-->
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                        <div class="seller-name">
                            <img class="float-start mt-2 me-3" src="{{asset('assets/img/homescreen48.png')}}" alt="">
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <p>
                                    برگ شاپ
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--            Seller Name:end-->

                    <!--                Seller Send Attr:start-->
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                        <div class="seller-send-attr">
                            <p class="fs-7 gray-600">
                                <i class="fa fa-truck text-danger pe-1"></i>
                                ارسال برگ شاپ
                            </p>
                        </div>
                    </div>
                    <!--                Seller Send Attr:end-->


                    <!--                Product Price:start-->
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-3">
                        <div class="product-price">
                            <span class="fs-5">{{$discount === true ? number_format($product->price_discount) : number_format($product->price)}} تومان</span>
                            <a href="" class="btn btn-danger border-radius-xl ms-3">افزودن به سبد</a>
                        </div>
                    </div>
                    <!--                Product Price:end-->
                </div>
            </div>
            <!--        Product Sellers Item:end-->
        </section>
        <!--    Product Sellers:end-->

        <!--    Product Tabs:start-->
        <section class="product-tabs mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item fs-7"><a class="nav-link active custom-link" href="#productdescription" data-bs-toggle="tab">
                        توضیحات
                    </a></li>
            </ul>
            <div class="tab-content p-3">
                <!--            Product Info:start-->
                <div class="tab-pane fade show active" id="productdescription">
                    <h2 class="fs-5 mb-3">توضیحات</h2>
                    <p>
                        {!! $product->description !!}
                    </p>
                </div>
                <!--            Product Info:end-->

                <!--            Product Check Expert:start-->
                <div class="tab-pane fade" id="productCheckExpert">
                    <div class="product-check-item border-bottom-gray-300 mb-3">
                        <h2 class="fs-5">طراحی آشنا و مناسب</h2>
                        <div class="product-check-item-img">
                            <p class="fs-7">
                                نوکیا مدتی است که در عرصه گوشی‌های هوشمند میان‌رده عملکرد مناسب و قابل قبولی را از خود
                                به‌نمایش گذاشته است. نوکیا G21 هم یکی از گوشی های هوشمند میان‌رده مقرون به‌صرفه و با‌کیفیت
                                این برند است که در جایگاه یک گوشی میان‌رده، توانایی ارائه عملکرد مناسب و قابل قبولی را دارد.
                                از نظر طراحی باید بگوییم که مشابه با طراحی در نظر گرفته شده برای نوکیا G21 را در بسیاری از
                                گوشی‌های هوشمند میان‌رده دیگر دیده بودیم که البته نوکیا سعی داشته تا طراحی کمی متفاوت‌تری را
                                برای قرار‌گیری سنسور‌های دوربین پشتی در نظر بگیرد. در نمای رو‌به‌رویی صفحه‌نمایش یکدستی را
                                شاهد هستیم که به طراحی ناچ واتردراپ هم مجهز شده است. بریدگی قطره‌ای شکل ناچ همانطور که در
                                تصویر مشاهده می‌کنید، در قسمت بالایی و مرکزی صفحه‌نمایش، سنسور دوربین سلفی را در خود جای
                                داده است.
                            </p>
                            <div class="text-center">
                                <img class="img-fluid" src="{{asset('assets/img/single-product-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="product-check-item border-bottom-gray-300 mb-3">
                        <h2 class="fs-5">طراحی آشنا و مناسب</h2>
                        <div class="product-check-item-img">
                            <p class="fs-7">
                                نوکیا مدتی است که در عرصه گوشی‌های هوشمند میان‌رده عملکرد مناسب و قابل قبولی را از خود
                                به‌نمایش گذاشته است. نوکیا G21 هم یکی از گوشی های هوشمند میان‌رده مقرون به‌صرفه و با‌کیفیت
                                این برند است که در جایگاه یک گوشی میان‌رده، توانایی ارائه عملکرد مناسب و قابل قبولی را دارد.
                                از نظر طراحی باید بگوییم که مشابه با طراحی در نظر گرفته شده برای نوکیا G21 را در بسیاری از
                                گوشی‌های هوشمند میان‌رده دیگر دیده بودیم که البته نوکیا سعی داشته تا طراحی کمی متفاوت‌تری را
                                برای قرار‌گیری سنسور‌های دوربین پشتی در نظر بگیرد. در نمای رو‌به‌رویی صفحه‌نمایش یکدستی را
                                شاهد هستیم که به طراحی ناچ واتردراپ هم مجهز شده است. بریدگی قطره‌ای شکل ناچ همانطور که در
                                تصویر مشاهده می‌کنید، در قسمت بالایی و مرکزی صفحه‌نمایش، سنسور دوربین سلفی را در خود جای
                                داده است.
                            </p>
                            <div class="text-center">
                                <img class="img-fluid" src="{{asset('assets/img/single-product-1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--            Product Check Expert:end-->

                <!--            Product Attributes:start-->
                <div class="tab-pane fade" id="attributes">
                    <h2 class="fs-5">مشخصات</h2>
                    <div class="attrs">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 offset-lg-2 offset-xl-2">
                            <ul>
                                <li class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="gray-600">وزن</p>
                                    <p class="pb-1 fs-7">۱.۲ کیلوگرم</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="gray-600">ابعاد</p>
                                    <p class="pb-1 fs-7">
                                        ۲۸۸x۲۰۰x۱۹.۹</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="gray-600">سازنده پردازنده</p>
                                    <p class="pb-1 fs-7">AMD</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="gray-600">سری پردازنده</p>
                                    <p class="pb-1 fs-7">ATHLON</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="gray-600">مدل پردازنده</p>
                                    <p class="pb-1 fs-7">
                                        Athlon Silver ۳۰۵۰e</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--            Product Attributes:end-->

            </div>
        </section>
        <!--    Product Tabs:end-->

        <!--    Similar Products:start-->
        <section class="similar-products border-radius-3xl border border-gray-300 mt-4 pb-4">
            <!--        Section Title:start-->
            <h2 class="my-4 section-title fs-5 ms-4">
                محصولات مشابه
            </h2>
            <!--        Section Title:end-->

            <!--            Slider:start-->
            <div class="swiper similarSlider">
                <div class="swiper-wrapper">
                    @foreach($similarProducts as $similarProduct)
                        <!--            Similar Item:start-->
                        <div class="swiper-slide position-relative">
                            <div class="similar-item px-2">
                                <img src="{{asset(!empty($similarProduct->images[0]) ? 'storage/'.$similarProduct->images[0]->src : 'storage/no-image-icon-vector-available.webp')}}" alt="" title="" class="img-fluid">
                                <h3 class="fs-7 gray-800 mt-3">خرید {{$similarProduct->title}}</h3>
                                <p class="fs-7 gray-900 text-end mt-2">{{!empty($similarProduct->price_discount) ? $similarProduct->price_discount : $similarProduct->price}} تومان</p>
                                <a href="" title="" class="stretched-link px-2"></a>
                            </div>
                        </div>
                        <!--            Similar Item:end-->
                    @endforeach
                </div>
                <div class="swiper-button-next bg-light border-radius-circle"></div>
                <div class="swiper-button-prev bg-light border-radius-circle"></div>
            </div>
            <!--            Slider:end-->
        </section>
        <!--    Similar Products:end-->

    </main>
    <!--Main:end-->
@endsection
