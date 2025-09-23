<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-3">
    <!--                Search Filters:start-->
    <div class="search-filters border border-radius-xl py-2 px-3">
        <!--                    Search Filters Title:start-->
        <h3 class="fs-5 fw-bold mt-2">فیلتر ها</h3>
        <!--                    Search Filters Title:end-->
        <form action="{{route('User.search')}}">
            @csrf
            <div class="accordion accordion-flush mt-4" id="accordionFlushExample">
                <!--                        Search Filters Item:start-->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                            دسته بندی
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                         aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach($categories as $item)
                                    @foreach($item->children as $itemChild)
                                        <li>
                                            <a href="">{{$itemChild->title}}</a>
                                            <label>
                                                <input {{in_array($itemChild->id, request()->categories ?? []) ? 'checked' : ''}} name="categories[]" value="{{$itemChild->id}}" type="checkbox" class="form-check-input">
                                            </label>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                            برند
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                         aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach($brands as $brand)
                                    <li>
                                        <a href="">{{$brand->title}}</a>
                                        <label>
                                            <input {{in_array($brand->id, request()->brands ?? []) ? 'checked' : ''}} value="{{$brand->id}}" name="brands[]" type="checkbox" class="form-check-input">
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                            محدوده قیمت
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                         aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="price-range d-flex justify-content-between align-items-center">
                                <span>از</span>
                                <input type="text" name="price_min" class="form-control mx-3 fs-3 text-center">
                                <span>تومان</span>
                            </div>
                            <div class="price-range d-flex justify-content-between align-items-center">
                                <span>تا</span>
                                <input type="text" name="price_max" class="form-control mx-3 fs-3 text-center">
                                <span>تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                        Search Filters Item:end-->
            </div>
            <!--                    Filter available Products:start-->
            <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">فقط کالاهای موجود</label>
            </div>
            <!--                    Filter Unavailable Products:end-->

            <!--                    Filter Button:start-->
            <div class="d-grid gap-2 mt-3">
                <button class="btn custom-btn-danger">
                    <i class="fa fa-filter"></i>
                    فیلتر کن!
                </button>
            </div>
        </form>
        <!--                    Filter Button:end-->
    </div>
    <!--                Search Filters:end-->

</div>
