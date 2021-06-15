@php
$title = 'Tất Cả Sản Phẩm';
if (request()->query('search')) {
$title = 'Tìm Kiếm - ' . request()->query('search');
}
if (request()->query('category')) {
$title = $nameCategory;
}
@endphp

@extends('layouts.client', ['title' => $title])

@section('content')
<div class="category-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-50">
                    <h2>Shop with us</h2>
                    <p>Browse from 230 latest items</p>
                </div>
            </div>
        </div>
        <div class="row">
            @include('client.products.main.left')

            <div class="col-xl-9 col-lg-9 col-md-8 ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="count-job mb-35">
                            @include('client.products.main.gridtop')
                        </div>
                    </div>
                </div>
                <div class="new-arrival new-arrival3">
                    <div class="row">
                        @foreach ($products as $product)
                        @include('client.products.items', ['product' => $product])
                        @endforeach
                    </div>
                </div>
                @include('client.products.main.pagination')
            </div>
        </div>
    </div>
</div>
@endsection