@extends('admin.view')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::زیر هدر-->
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::اطلاعات-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">افزودن دسته بندی</h5>
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
        <div class='d-flex flex-column-fluid'>
            <!--begin::Container-->
            <div class='container'>
                <!--begin::Dashboard-->
                <div class='container'>
                    <div class='card card-custom gutter-b'>
                        <div class='card-header'>
                            <h3 class='card-title'>فرم ایجاد محصول</h3>
                        </div>
                        <!--begin::Form-->
                        <form class='form' method="post" action="{{route('product.store')}}">
                            @csrf
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <div class='col-lg-6 mt-2'>
                                        <label>نام محصول:</label>
                                        <input type='text' value="{{old('title')}}" class='form-control p-3 @error('title') is-invalid @enderror' placeholder='نام را وارد کنید' name="title">
                                        @error('title')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>نام لاتین محصول:</label>
                                        <input type='text' value="{{old('english_title')}}" class='form-control p-3 @error('english_title') is-invalid @enderror' placeholder='نام لاتین را وارد کنید' name="english_title">
                                        @error('english_title')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>نام برند:</label>
                                        <select class="form-control p-0 @error('brand_id') is-invalid @enderror" name="brand_id">
                                            <option value="">برند را انتخاب کنید</option>
                                            @if($brands)
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>نام دسته بندی:</label>
                                        <select class="form-control p-0 @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value="">دسته بندی را انتخاب کنید</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>قیمت:</label>
                                        <input type='text' value="{{old('price')}}" class='form-control p-3 @error('price') is-invalid @enderror' placeholder='قیمت را وارد کنید' name="price">
                                        @error('price')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>قیمت با تخفیف:</label>
                                        <input type='text' value="{{old('price_discount')}}" class='form-control p-3 @error('price_discount') is-invalid @enderror' placeholder='قیمت با تخفیف را وارد کنید(با این قیمت به فروش میرسد)' name="price_discount">
                                        @error('price_discount')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6 mt-2'>
                                        <label>موجودی:</label>
                                        <input type='text' value="{{old('stock')}}" class='form-control p-3 @error('stock') is-invalid @enderror' placeholder='موجودی را وارد کنید' name="stock">
                                        @error('stock')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-12 mt-2'>
                                        <label>توضیحات:</label>
                                        <textarea id="description" class="form-control p-3 @error('description') is-invalid @enderror" placeholder='توضیحات را وارد کنید' name="description"></textarea>
                                        @error('description')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-12 mt-2'>
                                        <label>ویژگی ها:</label>
                                        <textarea id="features" class="form-control p-3 @error('features') is-invalid @enderror" placeholder='ویژگی را وارد کنید' name="features"></textarea>
                                        @error('features')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <input type='hidden' value="{{generateTrackingCode()}}" name="tracking_code">
                                </div>
                            </div>
                            <div class='card-footer'>
                                <div class='row'>
                                    <div class='col-lg-6 mt-2'>
                                        <button type='submit' class='btn btn-primary mr-2'>ذخیره کردن</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
