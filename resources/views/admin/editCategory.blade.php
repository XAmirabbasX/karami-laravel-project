@extends('admin.view')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::زیر هدر-->
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::اطلاعات-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش دسته بندی</h5>
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
                            <h3 class='card-title'>فرم ویرایش دسته بندی</h3>
                        </div>
                        <!--begin::Form-->
                        <form class='form' method="post" action="{{route('category.update', $category->id)}}">
                            @method('PUT')
                            @csrf
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <div class='col-lg-6'>
                                        <label>نام دسته:</label>
                                        <input type='text' value="{{$category->title}}" class='form-control @error('title') is-invalid @enderror' placeholder='نام را وارد کنید' name="title">
                                        @error('title')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6'>
                                        <label>نام دسته:</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="{{null}}">دسته والد را انتخاب کنید</option>
                                            @foreach($parent_categories as $parent_cat)
                                                @if($parent_cat->id == $category->id)
                                                    @continue
                                                @endif
                                                <option {{$category->parent_id == $parent_cat->id ? 'selected' : NULL}} value="{{$parent_cat->id}}">{{$parent_cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <div class='row'>
                                    <div class='col-lg-6'>
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
