  
@extends('layouts.frontend.index')

@section('title', 'Cart')

@section('content')   <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                        Cart
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Size</th>
                                <th scope="col">Màu</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng cộng</th>
                                <th scope="col">X</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has('cart'))
                                @foreach ($product_cart as $product)
                                    <tr>
                                        <td>{{$product['item']['tensanpham']}}</td>
                                        @foreach($hinhanh as $ha)
                                            @if (($ha->id_sanpham == $product['item']['id']) and ($ha->noihienthi == 'TC')) 
                                                <td><img src="upload/img/product/{{$ha->file_anh}}" width="100px"></td>
                                                @break
                                            @endif
                                        @endforeach
                                        <td>{{$product['detail']['size']}}</td>
                                        <td>{{$product['detail']['mau']}}</td>
                                        <td>{{$product['detail']['dongia']}} VNĐ</td>
                                        <td>{{$product['qty']}}</td>
                                        <td>{{($product['detail']['dongia'] * $product['qty'])}} VNĐ</td>
                                        <td><a class="delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                           
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>TỔNG CỘNG</h5>
                                </td>
                                <td>
                                    <h5>@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif VNĐ</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner d-flex align-items-center" style="float: right;">
                        <a class="gray_btn" href="product">TIẾP TỤC MUA SẮM</a>
                        <a class="primary-btn" href="checkout">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================End Cart Area =================-->
@endsection