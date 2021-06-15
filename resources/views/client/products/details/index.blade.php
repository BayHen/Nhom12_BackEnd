<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-8">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="fadeInUp" data-delay=".4s">Product details</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Product details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_image_area section-padding40">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-5">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="assets/img/gallery/product-details1.png">
                            <img src="{{asset('assets/img/gallery/'.$product->product_image)}}" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->product_name }}</h3>
                    @php
                    $sumRating = 0;
                    $totalComments = 0;
                    foreach ($comments as $key => $value) {
                    if (isset($value->comment_rating) && $value->comment_rating !== -1) {
                    $sumRating += $value->comment_rating;
                    $totalComments += 1;
                    }
                    }
                    if ($totalComments == 0) {
                    $totalComments = 1;
                    }
                    $averageRating = $sumRating / $totalComments;
                    @endphp
                    @include('client.products.details.rating', ['rating' => $averageRating])
                    <h2>{{ number_format($product->product_price) }} VNĐ</h2>
                    <ul class="list">


                        <li><a href="#">{{ $product->categories->category_name }}</a></li>

                        <li>
                            <p><span>Số lượng còn lại:</span> {{ $product->product_available }} Trong Kho</p>
                        </li>

                    </ul>
                    <p class="pro__info">{{ substr($product->product_description, 0, 150) }}...</p>
                    <div class="card_area">
                        <div class="add_to_cart">
                            <a href="{{ asset("cart?increase=1&product=". $product->product_id) }}" class="btn">add to cart</a>
                        </div>
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>