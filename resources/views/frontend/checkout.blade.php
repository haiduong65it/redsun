@extends('layouts.frontend.index')

@section('title', 'Checkout')

@section('banner')
	<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
@endsection

@section('content')
	<!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
            	@if (session('thongbao'))
			      <div class="alert alert-success">
			        {{session('thongbao')}}
			      </div>
			    @endif
                <div class="row">
                	<form class="row contact_form" action="checkout" method="post">
                		<input type="hidden" name="_token" value="{{csrf_token()}}">
	                    <div class="col-lg-8">
	                        <h3>THÔNG TIN KHÁCH HÀNG</h3>
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
	                    <div class="col-lg-4">
	                        <div class="order_box">
	                            <h2>Giỏ hàng của bạn</h2>
	                            <ul class="list">
	                            	@if(Session::has('cart'))
		                                <li><a href="#">Sản Phẩm <span>Giá</span></a></li>
		                                @foreach($product_cart as $product) 
			                                <li><a href="">{{$product['item']['tensanpham']}}<span class="middle">x {{$product['qty']}}</span> <span class="last">{{number_format($product['detail']['dongia'])}} VNĐ</span></a></li>
			                            @endforeach
			                        @endif
	                            </ul>
	                            <ul class="list list_2">
	                                <li><a href="">Subtotal <span>@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif VNĐ</span></a></li>
	                                <li><a href="">Shipping <span>Flat rate: Free</span></a></li>
	                                <li><a href="">Total <span>@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif VNĐ</span></a></li>
	                            </ul>
	                            <div class="payment_item">
	                                <div class="radion_btn">
	                                    <input type="radio" id="f-option5" name="payment" value="payment-1">
	                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
	                                    <div class="check"></div>
	                                </div>
	                                <p>Cửa hàng sẽ gửi đơn hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng.</p>
	                            </div>
	                            <div class="payment_item active">
	                                <div class="radion_btn">
	                                    <input type="radio" id="f-option6" name="payment" value="payment-2">
	                                    <label for="f-option6">Thanh toán qua thẻ</label>
	                                    <img src="frontend/img/product/card.jpg" alt="">
	                                    <div class="check"></div>
	                                </div>
	                                <p>Bạn chuyển khoản qua thẻ ngân hàng và sau đó cửa hàng sẽ gửi hàng đến địa chỉ của bạn sớm nhất.</p>
	                            </div>
	                            <button type="submit" class="primary-btn order-submit">Đặt hàng <i class="fa fa-chevron-right"></i></button> 
	                        </div>
	                    </div>
	                </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
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