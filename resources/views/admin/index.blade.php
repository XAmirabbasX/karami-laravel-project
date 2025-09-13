@php use ArielMejiaDev\LarapexCharts\LarapexChart; @endphp
@extends('admin.view')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::زیر هدر-->
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::اطلاعات-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        داشبورد </h5>
                    <!--end::Page Title-->

                    <!--begin::اقدامات-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                    <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">
                        افزودن جدید
                    </a>
                    <!--end::اقدامات-->
                </div>
                <!--end::اطلاعات-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::اقدامات-->
                    <a href="#" class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                        امروز
                    </a>
                    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base  mr-1">
                        ماه
                    </a>
                    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                        سال
                    </a>
                    <!--end::اقدامات-->

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::زیر هدر-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::داشبورد-->
                <!--begin::Row-->
                <div class="row">
                    <div class="card">
                        {!! $chart->container() !!}

                        <script src="{{ $chart->cdn() }}"></script>

                        {{ $chart->script() }}

                        {!! $chart2->container() !!}

                        <script src="{{ $chart2->cdn() }}"></script>

                        {{ $chart2->script() }}
                    </div>

                    <div class="card">
                        {!! $chart3->container() !!}

                        <script src="{{ $chart3->cdn() }}"></script>

                        {{ $chart3->script() }}
                    </div>
                </div>
                <!--end::Row-->
                <!--end::داشبورد-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
