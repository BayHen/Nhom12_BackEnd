@extends('layouts.admin', ['title' => "Products"])

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row py-3 mb-3">
                <div class="col-6">
                    <h1 class="h3 mb-3">Bình Luận</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:15%;">Mã Bình Luận</th>
                                    <th style="width:20%">Tác Giả</th>
                                    <th style="width:20%">Nội Dung</th>
                                    <th style="width:15%">Bài Viết</th>
                                    <th style="width:15%">Đánh Giá</th>
                                    <th style="width:15%">Thời Gian</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>username</td>
                                    <td>day la binh luan</td>
                                    <td>
                                        <a href="./products/1/">ahihih day la ten san pham</a>
                                    </td>
                                    </td>
                                    <td>
                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color: yellowgreen"></i>
                                    </td>
                                    <td>
                                        20/12/2001
                                    </td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <form class="mb-0" action="{{ asset('/be-admin/comments/1') }}"
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
