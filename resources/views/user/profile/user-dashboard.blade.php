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

                            <!--                        Verify Identity:start-->
                            <div class="user-panel-verify-identity border border-radius-xl p-3 d-flex justify-content-between align-items-center mb-3 mt-3">
                                <p class="fs-7">
                                    <i class="fa fa-info-circle text-warning align-middle pe-1"></i>
                                    برای افزایش امنیت حساب کاربری خود و جلوگیری از سوءاستفاده، لطفا هویت خود را تایید کنید
                                </p>
                                <a href="" class="text-info fs-7">تایید هویت
                                    <i class="fa fa-angle-left align-middle ps-1"></i>
                                </a>
                            </div>
                            <!--                        Verify Identity:end-->

                            <!--                        User Panel Status:start-->
                            <div class="user-panel-status mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-4">
                                        <!--                        My Current Status:start-->
                                        <div class="user-panel-current-status h-100">
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <!--                                           User All Buy:start-->
                                                <div class="user-all-buys p-3 mb-3">
                                                    <div class=" d-flex justify-content-start align-items-center">
                                                        <span class="border-radius-circle d-flex justify-content-center align-items-center">
                                                            <i class="fa fa-dollar-sign text-white"></i>
                                                        </span>
                                                        <div class="ms-3">
                                                            <p class="fs-7 gray-150">مبلغ کل سفارشات</p>
                                                            <p class="fs-5">135,789 تومان</p>
                                                        </div>
                                                    </div>
                                                    <a href="" class="text-white fs-8 mt-4 d-block">مشاهده تاریخچه سفارشات
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                </div>
                                                <!--                                           User All Buy:end-->
                                            </div>
                                        </div>
                                        <!--                        My Current Status:end-->
                                    </div>
                                </div>
                            </div>
                            <!--                        User Panel Status:end-->

                            <!--                        User Panel State:start-->
                            <div class="user-panel-state">
                                <div class="row">
                                    <!--                                User Panel Info:start-->
                                    <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                        <div class="wrapper h-100">
                                            <!--                                        User Panel State Top:start-->
                                            <div class="user-panel-state-left p-3 border-bottom-gray-300">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                         viewBox="0 0 48 48">
                                                        <g id="Group_25000" data-name="Group 25000"
                                                           transform="translate(-1367 -427)">
                                                            <path id="Path_32314" data-name="Path 32314"
                                                                  d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                                                                  transform="translate(1367 427)" fill="#d43533"></path>
                                                            <g id="Group_24770" data-name="Group 24770"
                                                               transform="translate(1382.999 443)">
                                                                <path id="Path_25692" data-name="Path 25692"
                                                                      d="M294.507,424.89a2,2,0,1,0,2,2A2,2,0,0,0,294.507,424.89Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,294.507,427.89Z"
                                                                      transform="translate(-289.508 -412.89)"
                                                                      fill="#fff"></path>
                                                                <path id="Path_25693" data-name="Path 25693"
                                                                      d="M302.507,424.89a2,2,0,1,0,2,2A2,2,0,0,0,302.507,424.89Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,302.507,427.89Z"
                                                                      transform="translate(-289.508 -412.89)"
                                                                      fill="#fff"></path>
                                                                <g id="LWPOLYLINE">
                                                                    <path id="Path_25694" data-name="Path 25694"
                                                                          d="M305.43,416.864a1.5,1.5,0,0,0-1.423-1.974h-9a.5.5,0,0,0,0,1h9a.467.467,0,0,1,.129.017.5.5,0,0,1,.354.611l-1.581,6a.5.5,0,0,1-.483.372h-7.462a.5.5,0,0,1-.489-.392l-1.871-8.433a1.5,1.5,0,0,0-1.465-1.175h-1.131a.5.5,0,1,0,0,1h1.043a.5.5,0,0,1,.489.391l1.871,8.434a1.5,1.5,0,0,0,1.465,1.175h7.55a1.5,1.5,0,0,0,1.423-1.026Z"
                                                                          transform="translate(-289.508 -412.89)"
                                                                          fill="#fff"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <div class="ms-3">
                                                        <h4 class="fw-bolder">10</h4>
                                                        <p class="fs-7 gray-500">محصول در سبد خرید</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                        User Panel State Top:end-->

                                            <!--                                        User Panel State Bottom:start-->
                                            <div class="user-panel-state-middle p-3 border-bottom-gray-300">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                         viewBox="0 0 48 48">
                                                        <g id="Group_25000" data-name="Group 25000"
                                                           transform="translate(-1367 -576)">
                                                            <path id="Path_32315" data-name="Path 32315"
                                                                  d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                                                                  transform="translate(1367 576)" fill="#85b567"></path>
                                                            <path id="_2e746ddacacf202af82cf4480bae6173"
                                                                  data-name="2e746ddacacf202af82cf4480bae6173"
                                                                  d="M11.483,3h-.009a.308.308,0,0,0-.1.026L4.26,6.068A.308.308,0,0,0,4,6.376V15.6a.308.308,0,0,0,.026.127v0l.009.017a.308.308,0,0,0,.157.147l7.116,3.042a.338.338,0,0,0,.382,0L18.8,15.9a.308.308,0,0,0,.189-.243q0-.008,0-.017s0-.01,0-.015,0-.01,0-.015,0,0,0,0V6.376a.308.308,0,0,0-.255-.306L11.632,3.031l-.007,0a.308.308,0,0,0-.05-.017l-.009,0-.022,0h-.062Zm.014.643L13,4.287,6.614,7.02,6.6,7.029,5.088,6.383,11.5,3.643Zm2.29.979,1.829.782L9.108,8.188a.414.414,0,0,0-.186.349v3.291l-.667-1a.308.308,0,0,0-.393-.1l-.786.392V7.493l6.712-2.87ZM16.4,5.738l1.509.645L11.5,9.124,9.99,8.48l6.39-2.733.018-.009ZM4.615,6.85l1.846.789v3.975a.308.308,0,0,0,.445.275l.987-.494,1.064,1.595v0a.308.308,0,0,0,.155.14h0l.027.009a.308.308,0,0,0,.057.012h.036l.036,0,.025,0,.018,0,.015,0a.308.308,0,0,0,.05-.022h0a.308.308,0,0,0,.156-.309V8.955l1.654.707v8.56L4.615,15.411Zm13.765,0v8.56L11.8,18.223V9.662Z"
                                                                  transform="translate(1379.5 588.5)" fill="#fff"
                                                                  stroke="#fff" stroke-width="0.25"
                                                                  fill-rule="evenodd"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="ms-3">
                                                        <h4 class="fw-bolder">21</h4>
                                                        <p class="fs-7 gray-500">تمام سفارشات</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                        User Panel State Bottom:end-->
                                        </div>
                                    </div>
                                    <!--                                User Panel Info:end-->

                                    <!--                                User Panel Default Address:start-->
                                    <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                        <div class="wrapper p-3 h-100">
                                            <p class="fw-bold">آدرس پیش فرض حمل و نقل</p>
                                            <p class="mb-2">
                                                ایران ، {{!empty($user->address[0]) ? $user->address[0]->city->province->name . $user->address[0]->city->name . $user->address[0]->address : '----'}}
                                            </p>
                                            <div class="d-grid gap-2 mt-4">
                                                <a href="" class="btn btn-secondary bg-gray-800 ">
                                                    <i class="fa fa-plus"></i>
                                                    افزودن آدرس جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                User Panel Default Address:end-->
                                </div>
                            </div>
                            <!--                        User Panel State:end-->
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
