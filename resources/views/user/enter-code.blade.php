<!DOCTYPE html>
<html dir="rtl" lang="fa">
<!--Head::start-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>سوپر قالب فروشگاهی برگ شاپ</title>

    <!--    Bootstrap 5 RTL-->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/bootstrap/bootstrap.rtl.css')}}">
    <!--    Fontawesome 5-->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/fontawesome/fontawesome.min.css')}}">
    <!--    Main Styles-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<!--Head::end-->

<!--Body::start-->
<body>
<div class="action-wrapper d-flex justify-content-center align-items-center h-100">
    <div class="form p-4 border border-radius-3xl border-gray-200">
        <img src="{{asset('assets/img/logo.png')}}" alt="" title="" class="mx-auto d-block">
        <a href="{{route('login')}}"><i class="fa fa-arrow-right position-absolute"></i></a>
        <div class="form-info text-right my-3">
            <h1 class="fw-bold fs-5">کد تایید را وارد کنید</h1>
            <div class="form-info-text my-4 gray-600 fs-7">
                <p>
                    کد تایید به شماره {{$mobile}} ارسال شد با وارد کردن کد در صورت وجود نداشتن اکانت برای شما یک اکانت ساخته خواهد شد
                </p>
            </div>
        </div>
        <form method="post" action="{{route('verifyRequest')}}">
            @csrf
            <div class="enter-code d-flex justify-content-between align-items-center ltr">
                <input name="code1" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
                <input name="code2" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
                <input name="code3" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
                <input name="code4" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
                <input name="code5" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
                <input name="code6" type="text" class="pin form-control text-center fs-4 border-radius-2xl">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-danger btn-block border-radius-xl fw-bold">ادامه</button>
            </div>
        </form>
    </div>
</div>

<!--Confirm Code Script(only for this page-->
<script src="{{asset('assets/js/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/confirm-code.js')}}"></script>
</body>
<!--Body::end-->

</html>
