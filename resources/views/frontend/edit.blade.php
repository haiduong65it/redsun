@extends('layouts.frontend.index')

@section('title', 'Account')

@section('css')
<style type="text/css">
	h2 {
		text-align: center;
		color: orange; 
		padding-bottom: 50px;
	}
</style>
@endsection

@section('banner')
    <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Account</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="">Account</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('content')
    <section class="login_box_area section_gap">
		<div class="container">
			@if ($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                  {{$err}}<br>
                @endforeach
              </div>
            @endif
			@if (session('thongbao'))
		      <div class="alert alert-success">
		        {{session('thongbao')}}
		      </div>
		    @endif
			<div>
				<h2>Account</h2>	
				<form class="row login_form" action="register" method="POST" id="contactForm">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<fieldset class="col">
						<legend>Thông tin đăng nhập</legend>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Email đăng nhập</label>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="InputMail" name="InputMail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Mật khẩu</label>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Nhập lại mật khẩu</label>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="re-password" name="re-password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
					</fieldset>
					<fieldset class="col">
						<legend>Thông tin cá nhân</legend>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Họ tên</label>
						<div class="col-md-12 form-group">
						  <input type="text" class="form-control" name="InputName" placeholder="Nhập Họ và Tên">
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Ngày sinh</label>
						<div class="col-md-12 form-group">
						  <input type="date" class="form-control" name="InputBirth">
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Giới tính</label>
						<div class="col-md-12 form-group">
						  <select name="InputSex" class="form-control">
						    <option value="Nam">Nam</option>
						    <option value="Nữ">Nữ</option>
						    <option value="Khác">Khác</option>
						  </select>
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Số điện thoại</label>
						<div class="col-md-12 form-group">
						  <input type="text" class="form-control" name="InputTel" placeholder="Nhập số điện thoại">
						</div>
						<label class="col-md-12" style="text-align: left;"><span style="color: red">*</span> Địa chỉ</label>
						<div class="col-md-12 form-group">
						  <input type="text" class="form-control" name="InputAdd" placeholder="Nhập địa chỉ">
						</div>
						<label class="col-md-12" style="text-align: left;">Avatar</label>
						<div class="col-md-12 form-group">
			                <input type="file" class="form-control" name="Avatar">
			            </div>
					</fieldset>
					<div class="col-md-12 form-group">
						<button type="submit" class="primary-btn">Register</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection

