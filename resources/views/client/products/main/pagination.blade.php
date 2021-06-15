<!-- Start Pagenation -->
<div class="row" style="display: flex; justify-content: center; margin-top: 10px;">
    <div class="col-xs-12">
        @php
            $page = request()->query('page');
            if (!$page) {
                $page = 1;
            }
        @endphp
        <ul class="htc__pagenation" style="color: black; ">
            @for ($i = 0; $i < $countAllProduct / $perPage; $i++)
                <li  class="fab {{ $page == $i + 1 ? 'active' : '' }}">
                    <a style="padding-left: 20px; color: black;" href="{{ request()->fullUrlWithQuery(['page' => $i + 1]) }}">
                        {{ $i + 1 }}
                    </a>
                </li>
            @endfor
        </ul>
    </div>
</div>
<!-- End Pagenation -->
