<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập | QHLaptop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="{{ asset('/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/style.css') }}" rel="stylesheet">
</head>

<body class="gray-bg">
  <div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <h1 class="logo-name">QH+</h1>
      <h3>Chào mừng trở lại</h3>
      <p>Đăng nhập để tiếp tục sử dụng hệ thống</p>

      <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="form-group">
          <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Email">
          @error('email')
            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
          <input
            id="password"
            type="password"
            name="password"
            required
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Mật khẩu">
          @error('password')
            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-group">
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <i></i> Ghi nhớ đăng nhập
            </label>
          </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
        <small>&copy; 2025 QHLaptop. All rights reserved.</small> 
      </p>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('/backend/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('/backend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/backend/js/jquery.metisMenu.js') }}"></script>
  <script src="{{ asset('/backend/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('/backend/js/inspinia.js') }}"></script>
  <script src="{{ asset('/backend/js/pace.min.js') }}"></script>
</body>
</html>
