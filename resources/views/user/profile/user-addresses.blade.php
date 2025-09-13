@extends('user.view')
@section('content')
    @error('name')
        @php
            toastr()->warning('لطفا تمامی مقادیر را کامل و فارسی وارد کنید')
        @endphp
    @enderror
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

                            <!--                        User Panel Addresses:start-->
                            <div class="user-panel-comments mt-3 border border-radius-xl">
                                <!--                            User Panel Addresses Header:start-->
                                <div class="user-panel-comments-header d-flex justify-content-between align-items-center p-3 border-bottom-gray-300">
                                    <p class="fw-bold">آدرس های من</p>
                                    <a href="" class="btn btn-outline-danger fs-7 border-radius-xl py-2" data-bs-toggle="modal" data-bs-target="#insertNewAddressModal">
                                        <i class="fa fa-plus"></i>
                                        ثبت آدرس جدید
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="insertNewAddressModal">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        افزودن آدرس جدید
                                                        <span class="d-block fs-7 gray-600 fw-lighter mt-2">آدرس تحویل سفارش را مشخص کنید.</span>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('user.addAddressToDB')}}" class="row g-3">
                                                        @csrf
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label fw-bold">نام و نام خانوادگی</label>
                                                            <input type="text" class="form-control border-radius-xl" name="name" id="name" placeholder="نام کامل خود را وارد کنید ...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phoneNumber" class="form-label fw-bold">شماره موبایل</label>
                                                            <input type="tel" class="form-control border-radius-xl" name="phoneNumber" id="phoneNumber" placeholder="09xxxxxxxxx">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="province" class="form-label fw-bold">انتخاب استان</label>
                                                            <select onchange="ChangeCities()" id="province" class="wide mt-2 border-radius-xl">
                                                                <option selected>انتخاب کنید</option>
                                                                @foreach($provinces as $province)
                                                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="city" class="form-label fw-bold">انتخاب شهر</label>
                                                            <select name="city" id="city" class="wide mt-2 border-radius-xl">
                                                                <option selected>اول استان را انتخاب کنید</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="address" class="form-label fw-bold">آدرس پستی</label>
                                                            <textarea class="form-control border-radius-xl" name="address" id="address" rows="3" placeholder="آدرس تحویل گیرنده مرسوله را وارد کنید ..."></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="postCode" class="form-label fw-bold">کد پستی</label>
                                                            <input type="text" class="form-control border-radius-xl" name="postCode" id="postCode" placeholder="کد پستی را بدون خط تیره وارد کنید ...">
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn custom-btn-primary border-radius-xl">ثبت و ارسال به این آدرس</button>
                                                            <button type="button" class="text-info btn fw-lighter" data-bs-dismiss="modal">انصراف و برگشت</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                            User Panel Addresses Header:end-->
                                @if(count($user->addresses) == 0)
                                    <div class="text-center my-5">
                                        <img src="{{asset('assets/img/address.svg')}}" alt="">
                                        <p class="fs-8">هنوز هیچ آدرسی ثبت نکرده اید.</p>
                                    </div>
                                @endif
                                <!--                            User Panel Addresses Content:start-->
                                <div class="user-panel-comments-content p-4">
                                    <!--                                User Panel Address Item:start-->
                                    @foreach($user->addresses as $address)
                                        <div class="user-panel-address-item bg-gray-150 p-2 mb-3">
                                            <div>
                                                <!--                                User Panel Comment Item Header:start-->
                                                <div class="user-panel-comment-item-header d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2">
                                                    <p class="fw-bold">
                                                        {{$address->address}}
                                                        @if($address->is_default == 1)
                                                            <span class="badge bg-info">پیشفرض</span>
                                                        @endif
                                                    </p>
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span>
                                                                <!--begin::Svg Icon-->
                                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item py-2" href="{{route('user.editAddress', $address->id)}}">
                                                                    <i class="fa fa-pen pe-4"></i>ویرایش به آدرس پیش فرض
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item py-2" href="{{route('user.deleteAddress', $address->id)}}">
                                                                    <i class="fa fa-trash-alt pe-4 text-danger"></i>حذف آدرس
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--                                User Panel Comment Item Header:end-->

                                                <!--                                    User Panel Comment Item Content:start-->
                                                <div class="user-panel-comment-item-content px-3 py-1">
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-road pe-2 gray-600"></i>
                                                        {{$address->city->name}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-envelope pe-2 gray-600"></i>
                                                        {{$address->postcode}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-phone pe-2 gray-600"></i>
                                                        {{$address->phone}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-user pe-2 gray-600"></i>
                                                        {{$address->name}}
                                                    </p>
                                                </div>
                                                <!--                                    User Panel Comment Item Content:end-->
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--                                User Panel Address Item:end-->
                                </div>
                                <!--                            User Panel Addresses Content:end-->
                            </div>
                            <!--                        User Panel Addresses:end-->
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
