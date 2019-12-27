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
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$2160.00</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>
                                    
                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
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
                        <a class="gray_btn" href="#">Continue Shopping</a>
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
                            $thanhvien = ThanhVien::find(Auth::user()->id);
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