@extends('layouts.client', ['title' => 'Cart'])

@section('content')
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-8">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="fadeInUp" data-delay=".4s">Cart List</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Cart List</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="cart_area section-padding40">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <h2 style="font-size: 17px; margin-bottom: 15px">
                    Giỏ hàng của bạn có {{ count($cartProducts) }} sản phẩm.</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="border: solid;" class="product-thumbnail">Sản Phẩm</th>
                            <th style="border: solid;" class="product-name">Tên Sản Phẩm</th>
                            <th style="border: solid;" class="product-price">Giá</th>
                            <th style="border: solid;" class="product-quantity">Số Lượng</th>
                            <th style="border: solid;" class="product-subtotal">Tổng Cộng</th>
                            <th style="border: solid;" class="product-remove">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($cartProducts) == 0)
                        <tr>
                            <td colspan="6">Không có sản phẩm nào.</td>
                        </tr>
                        @endif
                        @foreach ($cartProducts as $product)
                        @include('client.cart.item', ['product' => $product])
                        @endforeach
                    </tbody>
                </table>
                @include('client.cart.bottom')
            </div>
        </div>
    </div>
</section>
@endsection