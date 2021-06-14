@extends('layouts.client', ['title' => 'Cart'])

@section('content')
    <div class="cart-main-area ptb--100 bg__white">
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <div class="name col-md-12 col-sm-12 col-xs-12">
                    <h2 style="margin-bottom: 20px">Đơn hàng -
                        {{ session('.config_user')->user_username }}.</h2>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 style="font-size: 17px; margin-bottom: 15px">
                        Sản phẩm bạn đã đặt hàng.</h2>
                    <div class="table-content table-responsive">
                        <table style="border: solid;">
                            <thead>
                                <tr>
                                    <th style="border: solid;" class="product-thumbnail">Mã Đơn Hàng</th>
                                    <th style="border: solid;" class="product-name">Tên Sản Phẩm</th>
                                    <th style="border: solid;" class="product-price">Giá</th>
                                    <th style="border: solid;" class="product-quantity">Số Lượng</th>
                                    <th style="border: solid;" class="product-subtotal">Tổng Cộng</th>
                                    <th style="border: solid;" class="product-thumbnail">Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @php
                                        if ($order->order_status == 1) {
                                            continue;
                                        }
                                        $index = 0;
                                        $total = 0;
                                        foreach ($order->details as $detail) {
                                            $product = $detail->product;
                                            $total += $product->product_price * $detail->detail_quantity;
                                        }
                                    @endphp
                                    @foreach ($order->details as $detail)
                                        @php
                                            $index += 1;
                                            $product = $detail->product;
                                        @endphp
                                        <tr>
                                            @if ($index == 1)
                                                <td rowspan="{{ count($order->details) }}" class="product-thumbnail">
                                                    {{ $order->order_id }}</td>
                                            @endif
                                            <td style="border: solid;" class="product-name">
                                                <img src="{{ asset('assets/img/gallery/' . $product->product_image) }}"
                                                    alt="product images" style="width: 100px; height: 100px"><br />
                                                <a style="color: black;" href="{{ asset('products/' . $product->product_id) }}">
                                                    {{ $product->product_name }}</a>
                                            </td>
                                            <td style="border: solid;" class="product-price">
                                                <span class="amount">{{ number_format($product->product_price) }}
                                                    VNĐ</span>
                                            </td>
                                            <td style="border: solid;" class="product-quantity">
                                                <input type="number" value="{{ $detail->detail_quantity }}" disabled />
                                            </td>
                                            <td style="border: solid;" class="product-subtotal">
                                                {{ number_format($product->product_price * $detail->detail_quantity) }}
                                                VNĐ
                                            </td>
                                            @if ($index == 1)
                                                <td style="border: solid;" rowspan="{{ count($order->details) }}" class="product-subtotal">
                                                    {{ number_format($total) }}
                                                    VNĐ
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 style="font-size: 17px; margin-bottom: 15px">
                        Sản phẩm chúng tôi đã giao cho bạn.</h2>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                <th style="border: solid; " class="product-thumbnail">Mã Đơn Hàng</th>
                                    <th style="border: solid;" class="product-name">Tên Sản Phẩm</th>
                                    <th style="border: solid;" class="product-price">Giá</th>
                                    <th style="border: solid;" class="product-quantity">Số Lượng</th>
                                    <th style="border: solid;" class="product-subtotal">Tổng Cộng</th>
                                    <th style="border: solid;" class="product-thumbnail">Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @php
                                        if ($order->order_status == 0) {
                                            continue;
                                        }
                                        $index = 0;
                                        $total = 0;
                                        foreach ($order->details as $detail) {
                                            $product = $detail->product;
                                            $total += $product->product_price * $detail->detail_quantity;
                                        }
                                    @endphp
                                    @foreach ($order->details as $detail)
                                        @php
                                            $index += 1;
                                            $product = $detail->product;
                                        @endphp
                                        <tr>
                                        @if ($index == 1)
                                                <td rowspan="{{ count($order->details) }}" class="product-thumbnail">
                                                    {{ $order->order_id }}</td>
                                            @endif
                                            <td style="border: solid;" class="product-name">
                                                <img src="{{ asset('assets/img/gallery/' . $product->product_image) }}"
                                                    alt="product images" style="width: 100px; height: 100px"><br />
                                                <a style="color: black;" href="{{ asset('products/' . $product->product_id) }}">
                                                    {{ $product->product_name }}</a>
                                            </td>
                                            <td style="border: solid;" class="product-price">
                                                <span class="amount">{{ number_format($product->product_price) }}
                                                    VNĐ</span>
                                            </td>
                                            <td style="border: solid;" class="product-quantity">
                                                <input type="number" value="{{ $detail->detail_quantity }}" disabled />
                                            </td>
                                            <td style="border: solid;" class="product-subtotal">
                                                {{ number_format($product->product_price * $detail->detail_quantity) }}
                                                VNĐ
                                            </td>
                                            @if ($index == 1)
                                                <td style="border: solid;" rowspan="{{ count($order->details) }}" class="product-subtotal">
                                                    {{ number_format($total) }}
                                                    VNĐ
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
