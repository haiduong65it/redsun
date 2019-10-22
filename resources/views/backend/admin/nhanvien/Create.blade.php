@extends('layouts.admin.index')

@section('title', 'Thêm mới nhân viên')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nhân viên
        <small>Thêm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nhân viên</a></li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Thêm mới nhân viên</h3>
            </div>
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
            <form class="forms-sample" action="admin/nhanvien/them" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="InputName">Họ Tên</label>
                <input type="text" class="form-control" name="InputName" placeholder="Nhập Họ và Tên">
              </div>
              <div class="form-group">
                <label for="InputBirth">Ngày sinh</label>
                <input type="date" class="form-control" name="InputBirth" placeholder="Chọn ngày sinh">
              </div>
              <div class="form-group">
                <label for="InputSex">Giới tính</label><br>
                <select name="InputSex">
                  <option value="Male" selected="selected">Nam</option>
                  <option value="Female">Nữ</option>
                  <option value="other">Khác</option>
                </select>
              </div>
              <div class="form-group">
                <label for="InputTel">Số điện thoại</label>
                <input type="text" class="form-control" name="InputTel" placeholder="Nhập số điện thoại">
              </div>
              <div class="form-group">
                <label for="InputAddress">Địa chỉ</label>
                <input type="text" class="form-control" name="InputAddress" placeholder="Nhập địa chỉ">
              </div>
              <div class="form-group">
                <label for="InputCV">Chức vụ</label><br>
                <select name="Inputchucvu">
                  <option value="nhanvienbanhang" selected="selected">Nhân viên bán hàng</option>
                  <option value="nhanviengiaohang">Nhân viên giao hàng</option>
                  <option value="nhanvienkho">Nhân viên kho</option>
                </select>
              </div>
              <div class="form-group">
                <label for="InputAvatar">Avatar</label>
                <input type="file" class="form-control" name="InputAvatar" placeholder="Chọn ảnh làm avatar">
              </div>
              <div class="form-group">
                <label for="InputID">Tên đăng nhập</label>
                <input type="text" class="form-control" name="InputID" placeholder="Nhập ID nhân viên">
              </div>
              <div class="form-group">
                <label for="InputPassword">Mật Khẩu</label>
                <input type="password" class="form-control" name="InputPassword" placeholder="Nhập Mật khẩu">
              </div>
              <button type="submit" class="btn btn-success mr-2">Thêm</button>
              <button type="reset" class="btn btn-light">Làm mới</button>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

