@extends('layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Quản lý đơn hàng</h1>

    <table class="table-auto w-full bg-white shadow-md rounded mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2 font-bold">ID</th>
                <th class="px-4 py-2 font-bold">Khách hàng</th>
                <th class="px-4 py-2 font-bold">Trạng thái</th>
                <th class="px-4 py-2 font-bold">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{ $order->id }}</td>
                    <td class="border px-4 py-2">{{ $order->user?->name ?? 'Không rõ' }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-blue-500">Sửa</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">Chưa có đơn hàng nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
