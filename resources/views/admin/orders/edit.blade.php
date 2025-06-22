@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cập nhật đơn hàng #{{ $order->id }}</h2>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Trạng thái đơn hàng:</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Huỷ</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-2">Quay lại</a>
    </form>
</div>
@endsection
