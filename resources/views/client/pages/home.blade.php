@extends('layouts.client', ['layout' => 'home', 'title' => 'Home'])

@section('content')
<main>
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider hero-overly1 slider-height d-flex align-items-center slider-bg1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="hero__caption">
                                <span>70% Sale off </span>
                                <h1 data-animation="fadeInUp" data-delay=".4s">Furniture at Cost</h1>
                                <p data-animation="fadeInUp" data-delay=".6s">Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</p>

                                <div class="hero__btn" data-animation="fadeInUp" data-delay=".7s">
                                    <a href="{{asset('/products')}}" class="btn hero-btn">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="properties new-arrival fix">
        <div class="container">

            @include('client.home.titlecategory', [
            'title' => 'POPULAR PRODUCTS',
            'slogan' => 'Khám phá những sản phẩm của chúng tôi.' ])
            <div class="row">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="$category_id" role="tabpanel" aria-labelledby="nav-Sofa-tab">
                        <div class="row">
                            @foreach ($productsNew as $product)
                            <div class="col-xl-4 col-lg-6 col-md-6 ">

                                <div class="single-new-arrival mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="{{asset('assets/img/gallery/'.$product->product_image)}}" style="width: 330px; height: 220px;" alt="">
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="{{ asset('products/'.$product->product_id) }}">{{ $product->product_name }}</a></h3>
                                        <span>{{ number_format($product->product_price) }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="instagram-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="instra-tittle mb-40">
                        <div class="section-tittle">
                            <img src="assets/img/gallery/insta.png" alt="">
                            <h2>Get Inspired with Instagram</h2>
                            <P class="mb-35">Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</P>
                            <a href="product.html" class="border-btn">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row no-gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="single-instagram">
                                <img src="assets/img//gallery/instra1.png" alt="" class="w-100">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="single-instagram">
                                <img src="assets/img//gallery/instra2.png" alt="" class="w-100">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="new-arrival new-arrival2">
        <div class="container">
            @include('client.home.titlecategory', [
            'title' => 'TOP PICK',
            'slogan' => 'Khám phá những sản phẩm bán chạy của chúng tôi.' ])
            <div class="row">
                @foreach ($productsTopPick as $product)
                <div class="col-xl-4 col-lg-6 col-md-6 ">

                    <div class="single-new-arrival mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('assets/img/gallery/'.$product->product_image)}}" style="width: 330px; height: 220px;" alt="">
                        </div>
                        <div class="popular-caption">
                            <h3><a href="{{ asset('products/'.$product->product_id) }}">{{ $product->product_name }}</a></h3>
                            <span>{{ number_format($product->product_price) }} VNĐ</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="room-btn">
                    <a href="{{asset('/products')}}" class="border-btn">Discover More</a>
                </div>
            </div>
        </div>
    </div>
    @include('client.common.service')
</main>
@endsection