<!-- Start Header Area -->
<header class="header_area sticky-header">
    
    <div class="main_menu">
        <div class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav ml-auto navbar-right">
                        @if (Auth::guard('thanhvien')->check())
                            <li class="nav-item"><a class="nav-link" href="edit/{{Auth::guard('thanhvien')->user()->id}}">Xin chào, {{Auth::guard('thanhvien')->user()->hoten}} <span class="fa fa-fw fa-user"></span></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout">Đăng xuất</a></li>
                            <li class="nav-item">
                                <a href="cart" class="nav-link dropdown-toggle">Giỏ hàng <i class="fa fa-fw fa-shopping-cart"></i><span>@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif</span></a>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="login">Đăng nhập</a></li>
                            <li class="nav-item"><a class="nav-link" href="register">Đăng kí</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="frontend/img/banner.jpg" alt="" height="60px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
                            <li class="nav-item submenu dropdown">
                            <a href="product" class="nav-link dropdown-toggle">Sản phẩm</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="introduce" class="nav-link dropdown-toggle">Giới thiệu</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="guide" class="nav-link dropdown-toggle">Hướng dẫn mua hàng</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->