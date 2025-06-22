@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Chỉnh sửa sản phẩm</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Số lượng</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="image">Ảnh sản phẩm (nếu muốn đổi)</label>
            <input type="file" name="image" class="form-control">
            <br>
            <img src="{{ asset('storage/' . $product->image) }}" width="100">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
