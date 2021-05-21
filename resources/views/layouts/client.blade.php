<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('client.base.head', ['title' => $title ?? 'No Title'])

<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>

<body>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    
    @include('client.common.header')
    
    @if ($layout ?? 'default' == 'home')
            @yield('content')
        @else
            @yield('content')
            @include('client.common.service')
        @endif
   
    @include('client.common.footer')
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    @include('client.base.script')
</body>

</html>