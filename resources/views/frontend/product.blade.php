@extends('layouts.frontend.index')

@section('title', 'Product')

@section('content')

<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Trang Sản Phẩm</h1>
				</div>
			</div>
		</div>
</section>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Lọc sản phẩm</div>
						<div class="common-filter">
							<div class="head">Loại sản phẩm</div>
							<form action="#">
								<ul>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">
										@foreach($loaisanpham as $lsp)
	                    					<option value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}</option>
	                    				@endforeach
										<span>(29)</span></label></li>
								</ul>
							</form>
						</div>
					<div class="common-filter">
						<div class="head">Thương hiệu</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">
									@foreach($thuonghieu as $th)
				                    	<option value="{{$th->id}}">{{$th->tenthuonghieu}}</option>
				                	@endforeach
									<span>(29)</span></label></li>
						</form>
					</div>
				<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select  class="form-control"  name="LSP" id="LSP">
		                    @foreach($loaisanpham as $lsp)
		                    <option value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}</option>
		                    @endforeach
                		</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
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
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select  class="form-control"  name="LSP" id="LSP">
		                    @foreach($loaisanpham as $lsp)
		                    <option value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}</option>
		                    @endforeach
                		</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
			
		</div>
	</div>
