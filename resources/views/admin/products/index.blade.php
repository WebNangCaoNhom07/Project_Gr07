@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách sản phẩm</h1>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Thêm sản phẩm</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Kho</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0) }} đ</td>
                    <td>{{ $product->stock }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="60"></td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
