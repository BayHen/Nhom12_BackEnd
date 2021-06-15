@php
if (!isset($rating)) {
    $rating = 0;
}
if (!isset($noRating)) {
    $noRating = false;
}
@endphp

@if (!$noRating)
    <ul class="rating">
        @for ($i = 0; $i < $rating; $i++)
            <li class="fab"><i class="fas fa-star"></i></li>
        @endfor
        @for ($i = 0; $i < 5 - $rating; $i++)
            <li class="fab old"><i class="far fa-star"></i></i></li>
        @endfor
    </ul>
@endif
