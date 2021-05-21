@extends('layouts.admin', ['title' => "Users"])

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Người Dùng</h1>
            <div class="row">
                <div class="col-12 my-2">
                    <a href="{{ asset('/be-admin/users/create') }}">
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:25%;">Id Người Dùng</th>
                                    <th style="width:40%">Username</th>
                                    <th style="width:25%">Quyền Hạn</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123</td>
                                    <td>Username</td>
                                    <td>Administrator</td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('/be-admin/users/1/edit') }}">
                                                <button type="button" class="btn">
                                                    <i class="align-middle" data-feather="edit-2"></i>
                                                </button>
                                            </a>
                                            <form class="mb-0" action="{{ asset('/be-admin/users/1') }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="text" name="type" value="manufacturer" style="display: none">
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
