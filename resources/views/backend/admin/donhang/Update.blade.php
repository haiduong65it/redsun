@extends('layouts.admin.index')

@section('title', 'Cập nhật thành viên')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thành viên
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Thành viên</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin thành viên</h3>
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
            <form class="forms-sample" action="admin/thanhvien/sua/{{$thanhvien->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="InputName">Họ Tên</label>
                <input type="text" class="form-control" name="InputName" placeholder="Nhập Họ và Tên" value="{{$thanhvien->hoten}}" disabled="">
              </div>
              <div class="form-group">
                <label for="InputBirth">Ngày sinh</label>
                <input type="date" class="form-control" name="InputBirth" placeholder="Chọn ngày sinh" value="{{$thanhvien->ngaysinh}}" disabled="">
              </div>
              <div class="form-group">
                <label for="InputSex">Giới tính</label><br>
                <select name="InputSex" disabled="">
                  <option value="Male" @if ($thanhvien->gioitinh == 'Male') {{"selected='selected'"}} @endif>Nam</option>
                  <option value="Female" @if ($thanhvien->gioitinh == 'Female') {{"selected='selected'"}} @endif>Nữ</option>
                  <option value="other" @if ($thanhvien->gioitinh == 'other') {{"selected='selected'"}} @endif>Khác</option>
                </select>
              </div>
              <div class="form-group">
                <label for="InputTel">Số điện thoại</label>
                <input type="text" class="form-control" name="InputTel" placeholder="Nhập số điện thoại" value="{{$thanhvien->sdt}}" disabled="">
              </div>
              <div class="form-group">
                <label for="InputAddress">Địa chỉ</label>
                <input type="text" class="form-control" name="InputAddress" placeholder="Nhập địa chỉ" value="{{$thanhvien->diachi}}" disabled="">
              </div>
              <div class="form-group">
                <label for="InputAvatar">Avatar</label>
                <img src="upload/img/avatar/thanhvien/{{$thanhvien->avatar}}" height="100px">
              </div>
              <div class="form-group">
                <input type="checkbox" name="changeID" id="changeID">
                <label for="InputID">Đổi Tên đăng nhập</label>
                <input type="text" class="form-control id" name="InputID" placeholder="Nhập ID nhân viên" value="{{$thanhvien->tendangnhap}}" disabled="">
              </div>
              <div class="form-group">
                <input type="checkbox" name="changePass" id="changePass">
                <label for="InputPassword">Đổi Mật Khẩu</label>
                <input type="password" class="form-control password" name="InputPassword" placeholder="Nhập Mật khẩu" disabled="">
              </div>
              <div class="form-group">
                <label for="PasswordAgain">Đổi Mật Khẩu</label>
                <input type="password" class="form-control password" name="PasswordAgain" placeholder="Nhập lại Mật khẩu" disabled="">
              </div>
              <button type="submit" class="btn btn-success mr-2">Thay đổi</button>
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#changePass").change(function(){
        if ($(this).is(":checked")){
          $(".password").removeAttr('disabled');
        }
        else {
          $(".password").attr('disabled','')
        }
      });
      $("#changeID").change(function(){
        if ($(this).is(":checked")){
          $(".id").removeAttr('disabled');
        }
        else {
          $(".id").attr('disabled','')
        }
      });
    });
  </script>
@endsection