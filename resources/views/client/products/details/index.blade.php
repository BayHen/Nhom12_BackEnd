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
                            <img src="{{asset('assets/img/gallery/product-details1.png')}}" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->product_name }}</h3>
                    <h2>{{ $product->product_price }} VNĐ</h2>
                    <ul class="list">

                        @foreach ($product->categories as $category)
                        <li><a href="#">{{ $category->category_name }}</a></li>
                        @endforeach
                        <li>
                            <p><span>Số lượng còn lại:</span> {{ $product->product_available }} Trong Kho</p>
                        </li>
                        
                    </ul>
                    <p class="pro__info">{{ substr($product->product_description, 0, 150) }}...</p>
                    <div class="card_area">
                        <div class="add_to_cart">
                            <a href="#" class="btn">add to cart</a>
                            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                        </div>
                        <div class="social_icon">
                            <a href="#" class="fb"><i class="ti-facebook"></i></a>
                            <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                            <a href="#" class="li"><i class="ti-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>