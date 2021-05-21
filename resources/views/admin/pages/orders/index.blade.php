@extends('layouts.admin', ['title' => "Products"])

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row py-3 mb-3">
                <div class="col-6">
                    <h1 class="h3 mb-3">Đơn Đặt Hàng</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:10%;">Mã Đơn</th>
                                    <th style="width:30%;">Các Sản Phẩm</th>
                                    <th style="width:20%;">Người Mua</th>
                                    <th style="width:20%">Trạng thái đơn hàng</th>
                                    <th style="width:15%">Thời Gian</th>
                                    <th>Hàng Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <ul>
                                            <li>Bàn cafe - 1</li>
                                            <li>Ghế đá - 2</li>
                                            <li>Cây Bonsai - 3</li>
                                        </ul>
                                    </td>
                                    <td>
                                        anh hieu dz
                                    </td>
                                    <td>
                                        Đang Giao Hàng
                                    </td>
                                    <td>12/02/2021</td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('be-admin/products/1/edit') }}">
                                                <button type="button" class="btn">
                                                    <i class="align-middle" data-feather="check"></i>
                                                </button>
                                            </a>
                                            <form class="mb-0" action="{{ asset('/be-admin/orders/1') }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn" type="submit"><i class="align-middle"
                                                data-feather="trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
