@extends('admin.products.index')

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Chỉnh sửa sản phẩm</h5>
                </div>
                <div class="ibox-content">

                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="selling_price">Giá bán</label>
                            <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="actual_price">Giá gốc</label>
                            <input type="number" name="actual_price" class="form-control" value="{{ $product->actual_price }}">
                        </div>

                        <div class="form-group">
                            <label for="ram">RAM</label>
                            <input type="text" name="ram" class="form-control" value="{{ $product->ram }}">
                        </div>

                        <div class="form-group">
                            <label for="ssd">SSD</label>
                            <input type="text" name="ssd" class="form-control" value="{{ $product->ssd }}">
                        </div>

                        <div class="form-group">
                            <label for="processor">CPU</label>
                            <input type="text" name="processor" class="form-control" value="{{ $product->processor }}">
                        </div>

                        <div class="form-group">
                            <label for="operating_system">Hệ điều hành</label>
                            <input type="text" name="operating_system" class="form-control" value="{{ $product->operating_system }}">
                        </div>

                        <div class="form-group">
                            <label for="exchange_offer">Chính sách đổi trả</label>
                            <input type="text" name="exchange_offer" class="form-control" value="{{ $product->exchange_offer }}">
                        </div>

                        <div class="form-group">
                            <label for="display_size">Màn hình</label>
                            <input type="text" name="display_size" class="form-control" value="{{ $product->display_size }}">
                        </div>

                        <div class="form-group">
                            <label for="image">Ảnh sản phẩm (tùy chọn)</label>
                            <input type="file" name="image" class="form-control">
                            @if ($product->image)
                                <br>
                                <img src="{{ asset('storage/' . $product->image) }}" width="100">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
