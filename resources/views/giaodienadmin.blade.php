<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CSS Styles -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="{{ asset('backend/img/profile_small.jpg') }}" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">{{ Auth::user()->name }}</strong>
                                    </span>
                                    <span class="text-muted text-xs block">Admin <b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">AD+</div>
                    </li>

                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý shop</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
                            <li><a href="{{ route('admin.categories.index') }}">Danh mục</a></li>
                            <li><a href="{{ route('admin.orders.index') }}">Đơn hàng</a></li>
                            <li><a href="{{ route('admin.users.index') }}">Người dùng</a></li>
                            <li><a href="{{ route('admin.reviews.index') }}">Đánh giá</a></li>
                            <li><a href="{{ route('admin.reports.index') }}">Thống kê doanh thu</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page content -->
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
                    </div>
                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Admin Dashboard</h5>
                            </div>
                            <div class="ibox-content">
                                <p>Chào mừng bạn đến với trang quản trị shop bán laptop.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="float-right">
                    Laravel Admin Template
                </div>
                <div>
                    <strong>Copyright</strong> Your Company &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/inspinia.js') }}"></script>
</body>

</html>
