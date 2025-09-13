@extends('user.view')
@section('content')
    <!--User Panel:start-->
    <main class="mt-xxxx-large">
        <!--    User Panel Wrapper:start-->
        <div class="user-panel-wrapper">
            <div class="container">
                <div class="row">
                    @include('user.profileQuickAccessPanel')
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
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label fw-bold">نام و نام خانوادگی</label>
                                                            <input type="text" class="form-control border-radius-xl" id="name" placeholder="نام کامل خود را وارد کنید ...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phoneNumber" class="form-label fw-bold">شماره موبایل</label>
                                                            <input type="tel" class="form-control border-radius-xl" id="phoneNumber" placeholder="09xxxxxxxxx">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="province" class="form-label fw-bold">انتخاب استان</label>
                                                            <select id="province" class="wide mt-2 border-radius-xl">
                                                                <option selected>خراسان رضوی</option>
                                                                <option value="1">تهران</option>
                                                                <option value="2">فارش</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="city" class="form-label fw-bold">انتخاب شهر</label>
                                                            <select id="city" class="wide mt-2 border-radius-xl">
                                                                <option selected>سبزوار</option>
                                                                <option value="1">طبس</option>
                                                                <option value="2">بیرجند</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="address" class="form-label fw-bold">آدرس پستی</label>
                                                            <textarea class="form-control border-radius-xl" id="address" rows="3" placeholder="آدرس تحویل گیرنده مرسوله را وارد کنید ..."></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="postCode" class="form-label fw-bold">کد پستی</label>
                                                            <input type="text" class="form-control border-radius-xl" id="postCode" placeholder="کد پستی را بدون خط تیره وارد کنید ...">
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

                                <!--                            User Panel Addresses Content:start-->
                                <div class="user-panel-comments-content p-4">

                                    <!--                                User Panel Address Item:start-->
                                    <div class="user-panel-address-item bg-gray-150 p-2 mb-3">
                                        <div>
                                            <!--                                User Panel Comment Item Header:start-->
                                            <div class="user-panel-comment-item-header d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2">
                                                <p class="fw-bold">
                                                    سبزوار، بلوار آزادگان، آزادگان ۱۹، پلاک ۹۲
                                                    <span class="badge bg-info">پیشفرض</span>
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
                                                        <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#updateAddressModal">
                                                                <i class="fa fa-pen pe-4"></i>
                                                                ویرایش آدرس</a></li>
                                                        <li><a class="dropdown-item py-2" href="#">
                                                                <i class="fa fa-trash-alt pe-4 text-danger"></i>
                                                                حذف آدرس</a></li>
                                                    </ul>
                                                    <div class="modal fade" id="updateAddressModal">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        ویرایش آدرس
                                                                        <span class="d-block fs-7 gray-600 fw-lighter mt-2">آدرس تحویل سفارش را مشخص کنید.</span>
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="row g-3">
                                                                        <div class="col-md-6">
                                                                            <label for="name1" class="form-label fw-bold">نام و نام خانوادگی</label>
                                                                            <input type="text" class="form-control border-radius-xl" id="name1" placeholder="نام کامل خود را وارد کنید ...">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="phoneNumber1" class="form-label fw-bold">شماره موبایل</label>
                                                                            <input type="tel" class="form-control border-radius-xl" id="phoneNumber1" placeholder="09xxxxxxxxx">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="province1" class="form-label fw-bold">انتخاب استان</label>
                                                                            <select id="province1" class="wide mt-2 border-radius-xl">
                                                                                <option selected>خراسان رضوی</option>
                                                                                <option value="1">تهران</option>
                                                                                <option value="2">فارش</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="city1" class="form-label fw-bold">انتخاب شهر</label>
                                                                            <select id="city1" class="wide mt-2 border-radius-xl">
                                                                                <option selected>سبزوار</option>
                                                                                <option value="1">طبس</option>
                                                                                <option value="2">بیرجند</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <label for="address1" class="form-label fw-bold">آدرس پستی</label>
                                                                            <textarea class="form-control border-radius-xl" id="address1" rows="3" placeholder="آدرس تحویل گیرنده مرسوله را وارد کنید ..."></textarea>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="postCode1" class="form-label fw-bold">کد پستی</label>
                                                                            <input type="text" class="form-control border-radius-xl" id="postCode1" placeholder="کد پستی را بدون خط تیره وارد کنید ...">
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
                                            </div>
                                            <!--                                User Panel Comment Item Header:end-->

                                            <!--                                    User Panel Comment Item Content:start-->
                                            <div class="user-panel-comment-item-content px-3 py-1">
                                                <p class="py-1 gray-900 fw-light">
                                                    <i class="fa fa-road pe-2 gray-600"></i>
                                                    سبزوار
                                                </p>
                                                <p class="py-1 gray-900 fw-light">
                                                    <i class="fa fa-envelope pe-2 gray-600"></i>
                                                    ۹۶۱۵۶۳۵۸۷۱
                                                </p>
                                                <p class="py-1 gray-900 fw-light">
                                                    <i class="fa fa-phone pe-2 gray-600"></i>
                                                    09305489978
                                                </p>
                                                <p class="py-1 gray-900 fw-light">
                                                    <i class="fa fa-user pe-2 gray-600"></i>
                                                    محمد صادق گلی حسین آباد
                                                </p>
                                            </div>
                                            <!--                                    User Panel Comment Item Content:end-->
                                        </div>
                                    </div>
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
