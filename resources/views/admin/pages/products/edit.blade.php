@extends('layouts.admin', ['title' => "Add Products"])

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Sửa Sản Phẩm</h1>
        <div class="row">
            <div class="col-12 col-6">
                <div class="card px-5">
                    <div class="card-body">
                        <form action="{{ asset('be-admin/products/' . $product->product_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="form-label">Tên</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên..." value="{{ $product->product_name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Loại Sản Phẩm</label>
                                <select class="form-control" name="category" id="">
                                    @foreach ($categories as $category)
                                    <option {{ $product->category->category_id == $category->category_id ? 'selected' : '' }} value="{{ $category->category_id }}">
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mô Tả</label>
                        <textarea name="description" class="form-control" placeholder="Nhập mô tả ở đây..." rows="3">{{ $product->product_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Giá</label>
                        <input name="price" type="number" class="form-control" required value="{{ $product->product_price }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Số lượng</label>
                        <input name="available" type="number" class="form-control" required value="{{ $product->product_available }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100">Hình ảnh</label>
                        <input type="file" name="image" accept="img/gallery/*">
                        <small class="form-text text-muted">Chọn hình ảnh cho sản phẩm của bạn.</small>
                        <img style="width: 50%;" src="{{ asset('assets/img/gallery/' . $product->product_image) }}" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection