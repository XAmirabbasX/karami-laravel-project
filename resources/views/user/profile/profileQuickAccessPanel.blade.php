<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3">
    <!--        User Panel Aside:start-->
    <aside class="user-panel-aside border border-radius-xl py-3">
        <!--            User Panel Header:start-->
        <div class="user-panel-aside-header text-center border-bottom-gray-200 pb-2">
            <!--                            User Picture:start-->
            <i class="fa fa-user-circle cfs-1 gray-300"></i>
            <!--                            User Picture:end-->

            <!--                            User Name:start-->
            <p class="fw-bold mt-2">
                {{$user->name ?? '-----'}}
                <a href="" class="ps-2">
                    <i class="fa fa-pen cyan-300 fa-md"></i>
                </a>
            </p>
            <p class="gray-500">{{$user->phone}}</p>
            <!--                            User Name:end-->
        </div>
        <!--            User Panel Header:end-->

        <!--                        User Panel Aside Menu:start-->
        <div class="user-panel-aside-menu">
            <ul>
                <li class="{{Route::currentRouteName() == 'user.showProfileInfo' ? 'active' : ''}}">
                    <a href="user-dashboard.blade.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                        <span class="ps-2">
                                         خلاصه فعالیت ها
                                    </span>
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'User.userOrders' ? 'active' : ''}}">
                    <a href="{{route('User.userOrders')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <span class="ps-2">
                            سفارش ها
                        </span>
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'user.showProfileAddresses' ? 'active' : ''}}">
                    <a href="{{route('user.showProfileAddresses', $user->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pin-map" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                            <path fill-rule="evenodd"
                                  d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                        </svg>
                        <span class="ps-2">
                                         آدرس ها
                                    </span>
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'User.userInfos' ? 'active' : ''}}">
                    <a href="{{route('User.userInfos')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <span class="ps-2">
                                         اطلاعات حساب کاربری
                                    </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('User.logout')}}">
                        <i class="fa fa-sign-out-alt"></i>
                        <span class="ps-2">خروج</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--                        User Panel Aside Menu:end-->
    </aside>
    <!--        User Panel Aside:end-->
</div>
