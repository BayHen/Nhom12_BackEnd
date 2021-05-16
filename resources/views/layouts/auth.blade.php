<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('auth.base.head', ['title' => $title ?? 'No Title'])

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{('assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <main class="login-bg">
        @yield('content')
    </main>

    @include('auth.base.script')

</body>

</html>