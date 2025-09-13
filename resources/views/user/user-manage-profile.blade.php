@extends('user.view')
@section('content')
    <main class="mt-xxxx-large">
        <!--    User Panel Wrapper:start-->
        <div class="user-panel-wrapper">
            <div class="container">
                <div class="row">
                    @include('user.profileQuickAccessPanel')
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                        <!--        User Panel Content:start-->
                        <div class="user-panel-content">

                            <!--                        User Panel Profile:start-->
                            <div class="user-panel-profile mt-3 border border-radius-xl">
                                <!--                            User Panel Profile Header:start-->
                                <div class="user-panel-profile-header d-flex justify-content-between align-items-center p-3 border-bottom-gray-300 mb-3">
                                    <p class="fw-bold">مدیریت پروفایل</p>
                                </div>
                                <!--                            User Panel Profile Header:end-->

                                <!--                            User Panel Profile Content:start-->
                                <div class="user-panel-profile-content p-3">
                                    <form class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name1" class="form-label fw-bold">نام و نام خانوادگی</label>
                                            <input type="text" class="form-control border-radius-xl" id="name1"
                                                   placeholder="نام کامل خود را وارد کنید ..."
                                                   value="محمد صادق گلی حسین آباد">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phoneNumber1" class="form-label fw-bold">شماره موبایل</label>
                                            <input type="tel" class="form-control border-radius-xl" id="phoneNumber1"
                                                   placeholder="09xxxxxxxxx" value="09309874452">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold">عکس پروفایل</label>
                                            <div class="input-group c-pointer">
                                                <span class="input-group-text" id="basic-addon1">مرور</span>
                                                <div type="text" class="form-control" data-bs-toggle="modal"
                                                     data-bs-target="#selectProfileImageModal"><p>انتخاب فایل</p></div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="selectProfileImageModal">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">انتخابگر
                                                                    فایل</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <nav>
                                                                    <div class="nav nav-tabs nav-justified" id="nav-tab"
                                                                         role="tablist">
                                                                        <button class="nav-link active" id="nav-home-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#nav-home" type="button">
                                                                            انتخاب فایل
                                                                        </button>
                                                                        <button class="nav-link" id="nav-profile-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#nav-profile" type="button">
                                                                            آپلود فایل جدید
                                                                        </button>
                                                                    </div>
                                                                </nav>
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active" id="nav-home"
                                                                         role="tabpanel" aria-labelledby="nav-home-tab">
                                                                        <div class="row px-2 d-flex justify-content-start align-items-center">
                                                                            <div class="col-md-12 col-lg-5 mb-2">
                                                                                <select id="province"
                                                                                        class="wide mt-2 border-radius-xl">
                                                                                    <option selected>مرتب سازی براساس جدید
                                                                                        ترین ها
                                                                                    </option>
                                                                                    <option value="1">مرتب سازی براساس قدیمی
                                                                                        ترین ها
                                                                                    </option>
                                                                                    <option value="2">مرتب سازی براساس کوچک
                                                                                        ترین ها
                                                                                    </option>
                                                                                    <option value="2">مرتب سازی براساس بزرگ
                                                                                        ترین ها
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 col-lg-3 mb-2">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox" value=""
                                                                                           id="flexCheckDefault">
                                                                                    <label class="form-check-label fs-8"
                                                                                           for="flexCheckDefault">
                                                                                        فقط فایل های انتخاب شده
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-lg-4 mb-2">
                                                                                <input class="form-control"
                                                                                       type="text"
                                                                                       placeholder="جستجوی فایل مورد نظر ...">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-3">
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="{{asset('assets/img/coat-1.jpg')}}" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="{{asset('assets/img/coat-2.jpg')}}" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-3.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-4.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-5.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-6.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-8.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-9.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                            <div class="col-6 col-lg-4 col-xl-3 mb-3">
                                                                                <!--                                                                            File Box:start-->
                                                                                <div class="file-box border border-radius-xl p-2">
                                                                                    <div class="file-box-image text-center">
                                                                                        <img src="assets/img/coat-10.jpg" alt="" class="object-contain">
                                                                                    </div>
                                                                                    <div class="file-box-name mt-2">
                                                                                        <p class="fw-bold fs-7">
                                                                                            کت مردانه شیک
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="file-box-size">
                                                                                        <span class="fs-8 gray-500">1 مگابایت</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!--                                                                            File Box:end-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="nav-profile">
                                                                        <div class="file-upload p-3 mt-2 text-center py-5">
                                                                            <p class="fw-bold fs-4">آپلودر فایل</p>
                                                                            <p class="fs-7 fw-lighter mt-2">برای آپلود فایل کلیک کنید یا فایل خود را درگ کنید.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">ثبت و بستن
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="password" class="form-label fw-bold">رمز عبور جدید</label>
                                            <input type="password" class="form-control border-radius-xl" id="password"
                                                   placeholder="رمز جدید را وارد کنید">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="repassword" class="form-label fw-bold">تکرار رمز عبور</label>
                                            <input type="password" class="form-control border-radius-xl" id="repassword"
                                                   placeholder="رمز جدید را دوباره وارد کنید">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn custom-btn-danger border-radius-xl">ذخیره
                                                اطلاعات
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!--                            User Panel Profile Content:end-->
                            </div>
                            <!--                        User Panel Profile:end-->
                        </div>
                        <!--        User Panel Content:end-->
                    </div>
                </div>
            </div>
        </div>
        <!--    User Panel Wrapper:end-->
    </main>
@endsection
