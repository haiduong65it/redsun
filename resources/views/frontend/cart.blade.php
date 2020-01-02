  
@extends('layouts.frontend.index')

@section('title', 'Cart')

@section('content')   <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
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
                            
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                               {{--  <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                    <div class="billing-details">
                                        <div class="section-title" >
                                            <td class="title" style="text-align: center;"><strong>THÔNG TIN KHÁCH HÀNG</td>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td width="25%"><label>Chọn người nhận:</label></td>
                                                <td><label><input type='radio' name='ng_nhan' value='toi' id='toi' >Tôi</label></td>
                                                <td><label><input type='radio' name='ng_nhan' value='khac' id='ng_khac' checked="checked">Người khác</label></td>
                                            </tr>
                                            <tr>
                                                <td><label for="ten_nguoi_mua">Họ và tên: </label> <span style="color: red;">(*)</span></td>
                                                <td colspan="2"><input type="text" class="form-control" name="ten_nguoi_mua" id="ten_nguoi_mua" placeholder="Nhập họ và tên.." required ></td>
                                            </tr>
                                            <tr>
                                                <td><label for="dien_thoai">Sdt:</label> <span style="color: red;">(*)</span></td>
                                                <td colspan="2"><input type="text" class="form-control" name="dien_thoai" id="dien_thoai" placeholder="Nhập số điện thoại.." required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="dia_chi">Địa chỉ: </label> <span style="color: red;">(*)</span></td>
                                                <td colspan="2"><input type="text" class="form-control" name="dia_chi" id="dia_chi" placeholder="Nhập địa chỉ.." required ></td>
                                            </tr>
                                        </table>
                                    </div>
                    <div class="checkout_btn_inner d-flex align-items-center" style="float: right;">
                        <a class="gray_btn" href="#">TIẾP TỤC MUA SẮM</a>
                        <a class="primary-btn" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================End Cart Area =================-->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#toi').change(function(){
                if(($(this).is(':checked'))){
                    <?php 
                        use App\thanhvien;
                        if (Auth::guard('thanhvien')->check()){
                            $thanhvien = ThanhVien::find(Auth::guard('thanhvien')->user()->id);
                        }
                    ?>
                    var ten = "{{$thanhvien->hoten}}";
                    var sdt = "{{$thanhvien->sdt}}";
                    var diachi = "{{$thanhvien->diachi}}";
                    $('#ten_nguoi_mua').attr('value',ten);
                    $('#dien_thoai').attr('value',sdt);
                    $('#dia_chi').attr('value',diachi);
                }
            });
            $('#ng_khac').change(function(){
                if(($(this).is(':checked'))){
                    $('#ten_nguoi_mua').attr('value','');
                    $('#dien_thoai').attr('value','');
                    $('#dia_chi').attr('value','');
                }
            });
        });
        document.title = "Giỏ Hàng";
    </script>
@endsection