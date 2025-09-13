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

                            <!--                        User Panel Orders:start-->
                            <div class="user-panel-orders border border-radius-xl p-3 mb-3 mt-3">
                                <p class="fw-bold mb-4">
                                    تاریخچه سفارشات
                                </p>

                                <!--                            Orders Table:start-->
                                <table id="ordersTable" class="display responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 33px;">
                                            #
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" style="width: 112px;">
                                            شماره سفارش
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending" style="width: 99px;">
                                            تاریخ ثبت سفارش
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Age: activate to sort column ascending" style="width: 41px;">مبلغ
                                            پرداختی
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Start date: activate to sort column ascending" style="width: 88px;">
                                            وضعیت سفارش
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Salary: activate to sort column ascending" style="width: 75px;">
                                            جزئیات
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr class="odd">
                                            <td class="sorting_1">{{$key+1}}</td>
                                            <td>{{$order->tracking_code}}</td>
                                            <td>{{Morilog\Jalali\Jalalian::fromDateTime(new \DateTime($order->created_at))->format('Y/m/d')}}</td>
                                            <td>{{$order->amount_payable}} تومان</td>
                                            <td><span class="badge {{$order->status == 'paid' ? 'bg-success' : 'bg-danger'}}">{{$order->status == 'paid' ? 'پرداخت شده' : 'پرداخت نشده'}}</span></td>
                                            <td class="text-center">
                                                <a href="{{route('User.orderDetails', $order->tracking_code)}}" class="btn custom-btn-success custom-box-shadow-s-3">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th rowspan="1" colspan="1">#</th>
                                        <th rowspan="1" colspan="1">شماره سفارش</th>
                                        <th rowspan="1" colspan="1">تاریخ ثبت سفارش</th>
                                        <th rowspan="1" colspan="1">مبلغ پرداختی</th>
                                        <th rowspan="1" colspan="1">وضعیت سفارش</th>
                                        <th rowspan="1" colspan="1">جزئیات</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--                            Orders Table:end-->
                            </div>
                            <!--                        User Panel Orders:end-->
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
