@extends('admin.view')
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::زیر هدر-->
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::اطلاعات-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش مدیر</h5>
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
                            <h3 class='card-title'>فرم ویرایش ادمین</h3>
                        </div>
                        <!--begin::Form-->
                        <form class='form' method="post" action="{{route('admin.update', $admin->id)}}">
                            @csrf
                            @method('PUT')
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <div class='col-lg-6'>
                                        <label>نام ادمین:</label>
                                        <input type='text' value="{{$admin->name}}" class='form-control @error('name') is-invalid @enderror' placeholder='نام را وارد کنید' name="name">
                                        @error('name')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6'>
                                        <label>نام خانوادگی ادمین:</label>
                                        <input type='text' value="{{$admin->lastname}}" class='form-control @error('lastname') is-invalid @enderror' placeholder='نام را وارد کنید' name="lastname">
                                        @error('lastname')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6'>
                                        <label>شماره تلفن ادمین:</label>
                                        <input type='text' value="{{$admin->phone}}" class='form-control @error('phone') is-invalid @enderror' placeholder='نام را وارد کنید' name="phone">
                                        @error('phone')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-6'>
                                        <label>ایمیل ادمین:</label>
                                        <input type='text' value="{{$admin->email}}" class='form-control @error('email') is-invalid @enderror' placeholder='نام را وارد کنید' name="email">
                                        @error('email')
                                        <span class='form-text text-muted'>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class="form-group">
                                            <label>دسترسی های مدیر</label>
                                            <div class="checkbox-inline">
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="add-brand-access" value="0">
                                                    <input {{$admin->level[0] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="add-brand-access">
                                                    <span></span>ثبت برند</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="manage-brand-access" value="0">
                                                    <input {{$admin->level[1] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="manage-brand-access">
                                                    <span></span>مشاهده برندها</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="edit-brand-access" value="0">
                                                    <input {{$admin->level[2] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="edit-brand-access">
                                                    <span></span>ویرایش</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="add-category-access" value="0">
                                                    <input {{$admin->level[3] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="add-category-access">
                                                    <span></span>ثبت دسته بندی</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="manage-category-access" value="0">
                                                    <input {{$admin->level[4] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="manage-category-access">
                                                    <span></span>مشاهده دسته بندی ها</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="edit-category-access" value="0">
                                                    <input {{str($admin->level)[5] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="edit-category-access">
                                                    <span></span>ویرایش دسته بندی</label>
                                            </div>
                                            <div class="mt-3 checkbox-inline">
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="add-product-access" value="0">
                                                    <input {{$admin->level[6] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="add-product-access">
                                                    <span></span>اضافه کردن محصول</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="manage-product-access" value="0">
                                                    <input {{$admin->level[7] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="manage-product-access">
                                                    <span></span>مشاهده محصولات</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="edit-product-access" value="0">
                                                    <input {{$admin->level[8] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="edit-product-access">
                                                    <span></span>ویرایش محصول</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="add-admin-access" value="0">
                                                    <input {{$admin->level[9] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="add-admin-access">
                                                    <span></span>اضافه کردن مدیر</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="manage-admin-access" value="0">
                                                    <input {{$admin->level[10] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="manage-admin-access">
                                                    <span></span>مشاهده مدیران</label>
                                                <label class="ml-5 checkbox checkbox-lg">
                                                    <input type="hidden" name="edit-admin-access" value="0">
                                                    <input {{$admin->level[11] == 1 ? 'checked' : '' }} value="1" type="checkbox" name="edit-admin-access">
                                                    <span></span>ویرایش ادمین</label>
                                            </div>
                                        </div>
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
