@extends('layouts.client', ['title' => $product->product_name ])
@section('content')
@include('client.products.details.index')
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p class="pro__info">{{ $product->product_description }}</p>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        @if (count($comments) == 0)
                        <h2 class="text-center" style="font-size: 1.5em">
                            Chưa có bình luận nào cho sản phẩm này.
                        </h2>
                        @endif
                        @foreach ($comments as $comment)
                        @if ($comment->comment_rating == -1)
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img style="height: 100px; width: 100px;" src="{{asset('assets/img/gallery/OIP.PNG')}}" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4><a href="#">{{ $comment->user->user_username }}</a></h4>
                                        <p>{{ $comment->created_at }}</p>
                                        @include('client.products.details.rating', ['noRating' => true])
                                    </div>
                                </div>
                                <p>{{ $comment->comment_content }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        @if (!session('.config_user'))
                        <div style="display: flex; flex-direction: column; align-items: center">
                            <h2 class="text-center" style="font-size: 1.5em">
                                Vui lòng đăng nhập để bình luận sản phẩm.
                            </h2>
                            <div style="margin-top: 10px">
                                <a class="btn btn-primary" href="{{ asset('/log-in') }}" role="button">
                                    Đăng Nhập
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form action="{{ asset('be-admin/comments') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" style="font-size: 18px">Bình Luận</label>
                                    <input name="product" type="text" value="{{ $product->product_id }}" style="display: none">
                                    <textarea name="content" class="form-control" rows="3" placeholder="Nhập chi tiết đánh giá của bạn về sản phẩm..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">

                        @if (count($comments) == 0)
                        <h2 class="text-center" style="font-size: 1.5em">
                            Chưa có đánh giá nào cho sản phẩm này.
                        </h2>
                        @endif
                        @foreach ($comments as $comment)
                        @if ($comment->comment_rating != -1)
                        <div class="review_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img style="height: 100px; width: 100px;" src="{{asset('assets/img/gallery/OIP.PNG')}}" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $comment->created_at }}</p>
                                        @include('client.products.details.rating', ['rating' =>
                                        $comment->comment_rating ])
                                        <h4><a href="#">{{ $comment->user->user_username }}</a></h4>
                                    </div>
                                </div>
                                <p style="padding-left: 114px; margin-top: -25px;">{{ $comment->comment_content }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            @if (!session('.config_user'))
                            <div style="display: flex; flex-direction: column; align-items: center">
                                <h2 class="text-center" style="font-size: 1.5em">
                                    Vui lòng đăng nhập để đánh giá sản phẩm.
                                </h2>
                                <div style="margin-top: 10px">
                                    <a class="btn btn-primary" href="{{ asset('/log-in') }}" role="button">Đăng Nhập</a>
                                </div>
                            </div>
                            @elseif (count($product->orders) === 0)
                            <div style="display: flex; flex-direction: column; align-items: center">
                                <h2 class="text-center" style="font-size: 1.5em">
                                    Bạn phải mua sản phẩm để được đánh giá.
                                </h2>
                                <div style="margin-top: 10px">
                                    <a href="{{ asset('cart?increase=1&product=' . $product->product_id) }}">
                                        <button class=" btn fr__btn" style="border: 0">Thêm Vào Giỏ Hàng Ngay</button>
                                    </a>
                                </div>
                            </div>
                            @elseif ($isRatingOnce)
                            <div style="display: flex; flex-direction: column; align-items: center">
                                <h2 class="text-center" style="font-size: 1.5em">
                                    Bạn chỉ được đánh giá sản phẩm một lần. Bạn không thể đánh giá.
                                </h2>
                            </div>
                            @else
                            <form action="{{ asset('be-admin/comments') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" style="font-size: 18px">Đánh Giá</label>
                                    <ul class="rating">
                                        <li style="cursor: pointer;" class="icon-select fab"><i class="fas fa-star "></i></li>
                                        <li style="cursor: pointer;" class="icon-select fab"><i class="fas fa-star "></i></li>
                                        <li style="cursor: pointer;" class="icon-select fab"><i class="fas fa-star "></i></li>
                                        <li style="cursor: pointer;" class="icon-select fab"><i class="fas fa-star "></i></li>
                                        <li style="cursor: pointer;" class="icon-select fab"><i class="fas fa-star "></i></li>
                                        <input name="rating" id="ratingInput" type="text" value="5" style="display: none">
                                    </ul>
                                    <input name="product" type="text" value="{{ $product->product_id }}" style="display: none">
                                    <textarea name="content" class="form-control" rows="3" placeholder="Nhập chi tiết đánh giá của bạn về sản phẩm..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const iconSelect = document.querySelectorAll(".icon-select");
        const ratingInput = document.getElementById("ratingInput");
        for (let index = 0; index < iconSelect.length; index++) {
            iconSelect[index].addEventListener("click", () => {
                for (let jIndex = 0; jIndex <= index; jIndex++)
                    iconSelect[jIndex].classList.remove("old");
                for (let jIndex = index + 1; jIndex < iconSelect.length; jIndex++)
                    iconSelect[jIndex].classList.add("old");
                ratingInput.setAttribute("value", index + 1);
            })
        }
    </script>
</section>
@endsection