@extends('user.view')
@section('content')
    <!--Main:start-->
    <main class="container mt-xxxx-large">
        <!--    Search:start-->
        <div class="search">
            <div class="row">
                @include('user.SearchFilterSection')
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                    <!--                Products:start-->
                    <div class="products">
                        <!--                            Product Ordering:start-->
                        <div class="d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2 product-ordering">
                            <div>
                                <p class="d-inline fs-7">
                                    <i class="fa fa-sort-amount-down pe-1"></i>
                                    مرتب سازی:
                                </p>
                                <a href="" class="fs-8 gray-600 mx-1 text-danger">جدیدترین</a>
                                <a href="" class="fs-8 gray-600 mx-1">قدیمی ترین</a>
                                <a href="" class="fs-8 gray-600 mx-1">ارزان ترین</a>
                                <a href="" class="fs-8 gray-600 mx-1">گران ترین</a>
                            </div>
                            <p class="fs-8 count-of-comments">
                                {{$products->count()}} کالا
                            </p>
                        </div>
                        <!--                            Product Ordering:end-->
                        <div class="row">
                            <!--                            Product Item:start-->
                            @foreach($products as $product)
                                <div class="product-item col-sm-12 col-md-6 col-lg-4 col-xl-3 position-relative">
                                    <!--                            Product Colors:start-->
                                    <div class="product-item-color">
                                        <span class="badge bg-success border-radius-circle fs-11">&nbsp;</span>
                                        <span class="badge bg-info border-radius-circle fs-11">&nbsp;</span>
                                    </div>
                                    <!--                            Product Colors:end-->

                                    <!--                                Product Item Image:start-->
                                    <div class="product-item-img">
                                        <img src="{{asset('assets/img/laptop-1.jpg')}}" alt="" class="img-fluid">
                                    </div>
                                    <!--                                Product Item Image:end-->

                                    <!--                                Product Item Desc:start-->
                                    <div class="product-item-title">
                                        <h3 class="fs-7 fw-bold">{{$product->title}}</h3>
                                    </div>
                                    <!--                                Product Item Desc:end-->

                                    <!--                                Product Item Price:start-->
                                    <div class="product-item-price text-end my-3">
                                        <p class="fw-bold">
                                            {{number_format($product->price_discount ?? $product->price)}} تومان
                                        </p>
                                    </div>
                                    <!--                                Product Item Price:end-->

                                    <!--                            Product Link:start-->
                                    <a href="{{route('user.singleProduct', $product->tracking_code, $product->title)}}" class="stretched-link"></a>
                                    <!--                            Product Link:end-->
                                </div>
                            @endforeach
                            <!--                            Product Item:end-->
                        </div>
                    </div>
                    <!--                Products:end-->

                    <!--        Pagination:start-->
                    <nav class="mt-3 d-flex justify-content-center align-items-center">
                        <ul class="pagination">
                            <li class="page-item "><a class="page-link" href="#">
                                    <i class="fa fa-angle-right"></i>
                                </a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">
                                    <i class="fa fa-angle-left"></i>
                                </a></li>
                        </ul>
                    </nav>
                    <!--        Pagination:end-->
                </div>
            </div>
        </div>
        <!--    Search:end-->

    </main>
    <!--Main:end-->
@endsection
