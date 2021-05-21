<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/products' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/products') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sản Phẩm</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/taxonomies' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/taxonomies') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Hãng và Loại</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/orders' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/orders') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Đơn Đặt Hàng</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/comments' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/comments') }}">
                    <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">Bình Luận</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/users' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/users') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Người Dùng</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->getRequestUri() === '/be-admin/setting' ? 'active' : "" }}">
                <a class="sidebar-link" href="{{ asset('be-admin/setting') }}">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Cài Đặt</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
