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
                                    <li>

                                        <form action="#" class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search products">
                                            <div class="search-icon">
                                                <i class="ti-search"></i>
                                            </div>
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/log-in') }}" class="account-btn" target="_blank">My Account</a>
                                    </li>
                                    <li>
                                        <div class="card-stor">
                                            <img src="{{asset('assets/img/icon/card.svg')}}" alt="">
                                            <span>0</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>