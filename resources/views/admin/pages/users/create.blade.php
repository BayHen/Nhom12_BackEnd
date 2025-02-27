@extends('layouts.admin', ['title' => "Create Users"])

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Thêm Người Dùng</h1>
            <div class="row">
                <div class="col-12 col-6">
                    <div class="card px-5">
                        <div class="card-body">
                            <form action="{{ asset('be-admin/users')}}" method="POST">
                               @csrf
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input name="username" type="text" class="form-control" placeholder="Nhập tên..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Nhập mật khẩu..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Quyền Hạn</label>
                                    <select class="form-control" name="permission" id="" required>
                                        <option value="1">Nomal User</option>
                                        <option value="9">Administrator</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo Mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
