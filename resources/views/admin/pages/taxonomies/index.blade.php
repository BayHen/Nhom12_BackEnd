@extends('layouts.admin', ['title' => "Products"])

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Hãng Và Chuyên Mục</h1>
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="col-12 my-2">
                        <a href="{{ asset('be-admin/taxonomies/create?type=manufacturer') }}">
                            <button type="button" class="btn btn-primary">
                                Thêm
                            </button></a>
                    </div>
                    <div class="card">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:25%;">Mã Hãng</th>
                                    <th style="width:50%">Tên Hãng</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>nha san xuat</td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('be-admin/taxonomies/1/edit?type=manufacturer') }}">
                                                <button type="button" class="btn">
                                                    <i class=" align-middle" data-feather="edit-2"></i>
                                                </button>
                                            </a>
                                            <form class="mb-0" action="{{ asset('/be-admin/taxonomies/1') }}" method="POST">
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
                <div class="col-12 col-xl-6">
                    <div class="col-12 my-2">
                        <a href="{{ asset('be-admin/taxonomies/create?type=category') }}">
                            <button type="button" class="btn btn-primary">
                                Thêm
                            </button>
                        </a>
                    </div>
                    <div class="card">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:25%;">Mã Chuyên Mục</th>
                                    <th style="width:40%">Tên Chuyên Mục</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>dasdsad</td>
                                    <td>type</td>
                                    <td class="table-action">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ asset('be-admin/taxonomies/1/edit?type=category') }}">
                                                <button type="button" class="btn">
                                                    <i class=" align-middle" data-feather="edit-2"></i>
                                                </button>
                                            </a>
                                            <form class="mb-0" action="{{ asset('/be-admin/taxonomies/1') }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="text" name="type" value="category" style="display: none">
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
