@extends('layouts.frontend.index')

@section('title', 'Detail Product')

@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="detail_product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						@foreach($hinhanh as $ha)
                            @if (($ha->id_sanpham == $sanpham->id) && ($ha->noihienthi == 'CT'))
                                <div class="single-prd-item">
                                	<img  class="img-fluid" src="upload/img/product/{{$ha->file_anh}} " alt="" style="height: 400px !important; width: auto;"> 
                                </div>
                            @endif								
						@endforeach
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<form action="add-to-cart/{{$sanpham->id}}" method="get">
							<div class="product-details">
								<h3>{{$sanpham->tensanpham}}</h3>
								<div class="price">
		                            @foreach($chitietsanpham as $ct)
		                                @if ($ct->id_sanpham == $sanpham->id) <h6 id="price">Giá: {{$ct->dongia}} VNĐ</h6> 
		                                 	@break 
		                                @endif
		                            @endforeach
		                        </div>
							</div>

							<div class="product_count">
								<div class="size_color">
		                        	<h6 style="float: left;">Size và màu: </h6>
		                        	<select name="size_color" id="size_color">
		                        		<option>--Size&Color--</option>
								        @foreach($chitietsanpham as $ct)
								       		<option value="{{$ct->id}}">Size: {{$ct->size}} - Màu: {{$ct->mau}}</option>
								        @endforeach		
						            </select>
		                        </div>
								<h6 style="margin-top: 80px">Quantity: </h6>
								<input type="number" name="qty" id="sst" maxlength="12" value="1">
							</div>
							<button class="primary-btn d-flex align-items-center">Thêm vào giỏ</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<h2 style="background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%); height: 60px" class="primary-btn d-flex align-items-center">Comments</h2>
			<div class="row">
				<div class="col-lg-6">
					<div class="comment_list">
						<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/product/review-1.png" alt="">
								</div>
								<div class="media-body">
									<h4>Blake Ruiz</h4>
									<h5>12th Feb, 2018 at 05:56 pm</h5>
									<a class="reply_btn" href="#">Reply</a>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
								commodo</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="review_box">
						<h4>Post a comment</h4>
						<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
@endsection