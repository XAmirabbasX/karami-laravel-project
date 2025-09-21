@extends('user.view')
@section('content')
    <!--Main:start-->
    <main class="container mt-xxxx-large">
        <!--    Search:start-->
        <div class="search">
            <div class="row">
                @include('user.SearchFilterSection')
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <img src="{{asset('assets/img/not-found.svg')}}" alt="">
                        <div class="mt-3 border border-radius-xl py-2 px-4">
                            <p class="fw-bold">
                                <i class="fa fa-info-circle text-warning pe-2"></i>
                                کالایی با این مشخصات پیدا نکردیم
                            </p>
                            <p class="fs-7 fw-lighter">پیشنهاد می‌کنیم فیلترها را تغییر دهید</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    Search:end-->

    </main>
    <!--Main:end-->
@endsection
