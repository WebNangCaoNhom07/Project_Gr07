@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>

    <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }}₫</p>
    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
