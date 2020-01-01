@extends('layouts.frontend.index')

@section('title', 'Home')

@section('banner')
    <section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Bạn sẽ có nhiều thời gian để chăm chút cho sự lựa chọn giày dép. Có quá nhiều nghĩ  rằng giày dép không quan trọng, nhưng toàn bộ sự tinh tế của con người lại toát ra từ đôi chân.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="frontend/img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Bạn sẽ có nhiều thời gian để chăm chút cho sự lựa chọn giày dép. Có quá nhiều nghĩ  rằng giày dép không quan trọng, nhưng toàn bộ sự tinh tế của con người lại toát ra từ đôi chân.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="frontend/img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('content')

    <!-- start product Area -->
    <section>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1 style="margin: 50px">DANH MỤC SẢN PHẨM</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($sanpham as $sp)
                        <!-- single product -->
                        <div class="col-lg-3 col-md-6">
                            <a href="detail_product/{{$sp->id}}">
                                <div class="single-product">
                                    @foreach($hinhanh as $ha)
                                    @if (($ha->id_sanpham == $sp->id) && ($ha->noihienthi == 'TC'))
                                    <div>                                   
                                        <img  class="img-fluid" src="upload/img/product/{{$ha->file_anh}} " alt="" >
                                    </div> 
                                        
                                    @endif
                                    @endforeach
                                    <div class="product-details">
                                        <h6>{{$sp->tensanpham}}</h6>
                                        <div class="price">
                                            @foreach($chitietsanpham as $ct)
                                                @if ($ct->id_sanpham == $sp->id) <h6>Giá: {{$ct->dongia}} VNĐ</h6> @break @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>Exclusive Hot Deal Ends Soon!</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days">150</h1>
                                    <span class="smalltext">Days</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours">23</h1>
                                    <span class="smalltext">Hours</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes">47</h1>
                                    <span class="smalltext">Mins</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds">59</h1>
                                    <span class="smalltext">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="primary-btn">Shop Now</a>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <h1>Sản phẩm nổi bật</h1>
                    <div class="active-exclusive-product-slider">
                        @foreach($hinhanh as $ha)
                            @if ($ha->noihienthi == 'NB')
                                @foreach($sanpham as $sp)
                                    @if ($ha->id_sanpham == $sp->id)
                                    <!-- single exclusive carousel -->
                                    <a href="detail_product/{{$sp->id}}">
                                        <div class="single-exclusive-slider">
                                            <div>                                   
                                                <img  class="img-fluid" src="upload/img/product/{{$ha->file_anh}} " alt="" >
                                            </div>
                                            <div class="product-details" style="margin-top: 20px">
                                                <div class="price">
                                                    @foreach($chitietsanpham as $ct)
                                                        @if ($ct->id_sanpham == $sp->id) <h6> Giá: {{$ct->dongia}} VNĐ</h6> @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <h4>{{$sp->tensanpham}}</h4>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="frontend/img/brand/1.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="frontend/img/brand/2.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="frontend/img/brand/3.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="frontend/img/brand/4.png" alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="frontend/img/brand/5.png" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- End brand Area -->

   >    
@endsection