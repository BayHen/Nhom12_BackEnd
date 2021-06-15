<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
    <div class="single-new-arrival mb-50 text-center" style="height: 450px; width: 300px;">
        <div class="popular-img" style="height: 300px; width: 300px; display: flex; justify-content: center; align-items: center;">
            <img src="{{asset('assets/img/gallery/'.$product->product_image)}}" style="width: 330px; height: 220px;" alt="">
        </div>
        <div class="popular-caption">
            <h3><a href="{{ asset('products/'.$product->product_id) }}">{{ $product->product_name }}</a></h3>
            <span>{{ number_format($product->product_price) }} VNĐ</span>
        </div>
    </div>
</div>