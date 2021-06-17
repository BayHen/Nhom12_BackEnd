<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row menu-wrapper align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">

                        <div class="logo">
                            <a href="index.html"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>

                        <div class="logo2">
                            <a href="index.html"><img src="{{asset('assets/img/logo/logo2.png')}}" alt=""></a>
                        </div>

                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ asset('/') }}">Home</a></li>
                                    <li><a href="{{ asset('/products') }}">Product</a></li>
                                    <li><a href="{{ asset('/log-in') }}">Login</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right1 d-flex align-items-center">
                        <div class="search">
                            <ul class="d-flex align-items-center">
                                <li style="padding-left: 10px;">

                                    <form action="{{ asset("products") }}" method="GET" class="form-box f-right ">
                                        <input type="text" name="search" placeholder="Search products">
                                        <div class="search-icon">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </form>
                                </li>
                                <li style="padding-left: 10px;">
                                    <a style="display: flex ; color: black;" href="{{ asset('user') }} ">
                                        <i class="icon-user icons" style="color: black;"></i>
                                        {{ session('.config_user') ? session('.config_user')->user_username : '' }}</a>
                                </li>
                                <li style="padding-left: 10px;">
                                    @if (session('.config_user'))
                                    <div>
                                        <a href="{{ asset('logout') }}" title="Đăng Xuất">
                                            <!-- <i class="icon-logout icons" style="margin-right: 10px"></i> -->
                                            <i class="fas fa-sign-out-alt" style="color: black;"></i>
                                        </a>
                                    </div>
                                    @endif
                                </li>
                                <li style="padding-left: 10px;">
                                    <div class="card-stor">
                                        <a href="{{ asset('cart') }}">
                                        <img src="{{asset('assets/img/icon/card.svg')}}" alt="">
                                            <span class="htc__qua">{{ count($cartProducts) }}</span></a>
                                        </a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>