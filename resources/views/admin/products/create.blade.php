@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm sản phẩm mới</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Số lượng</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="image">Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
