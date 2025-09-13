@extends('user.view')
@section('content')
    <main class="mt-xxxx-large">
        <!--    User Panel Wrapper:start-->
        <div class="user-panel-wrapper">
            <div class="container">
                <div class="row">
                    @include('user.profile.profileQuickAccessPanel')

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
                                    <form method="post" action="{{route('User.addUserInfo')}}" class="row g-3">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="name1" class="form-label fw-bold">نام و نام خانوادگی</label>
                                            <input type="text" class="form-control border-radius-xl @error('name') is-invalid @enderror" name="name" id="name1"
                                                   placeholder="نام کامل خود را وارد کنید ..."
                                                   value="{{$user->name ?? ''}}">
                                            @error('name')
                                            <span class='form-text text-muted'>{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phoneNumber1" class="form-label fw-bold">شماره موبایل</label>
                                            <input type="tel" class="form-control border-radius-xl @error('phone') is-invalid @enderror" name="phone" id="phoneNumber1"
                                                   placeholder="09xxxxxxxxx" value="{{$user->phone}}">
                                            @error('phone')
                                            <span class='form-text text-muted'>{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label fw-bold">ایمیل</label>
                                            <input type="email" class="form-control border-radius-xl @error('email') is-invalid @enderror" name="email" id="email"
                                                   placeholder="example@gmail.com" value="{{$user->email}}">
                                            @error('email')
                                            <span class='form-text text-muted'>{{$message}}</span>
                                            @enderror
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
