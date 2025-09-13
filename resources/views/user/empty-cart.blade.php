@extends('user.view')
@section('content')
    <!--Main:start-->
    <main class="container mt-xxxx-large">
        <!--    Cart:start-->
        <div class="cart">
            <div class="tab-content p-3">
                <!--          Cart Empty:start-->
                <div class="tab-pane fade show active text-center" id="cart">
                    <div class="cart-empty border border-radius-3xl py-5">
                        <img src="{{asset('assets/img/empty-cart.svg')}}" alt="">
                        <p class="fs-5 fw-bold mt-3">سبد خرید شما خالی است!</p>
                    </div>
                </div>
                <!--          Cart Empty:end-->
            </div>
        </div>
        <!--    Cart:end-->
    </main>
    <!--Main:end-->
@endsection
