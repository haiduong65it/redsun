@extends('layouts.admin.index')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Chỉnh sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin admin</h3>
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
            <form class="forms-sample" action="admin/edit/{{$admin->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                  <label for="Name">Họ Tên</label>
                  <input type="text" class="form-control" name="Name" placeholder="Nhập Họ và Tên" value="{{$admin->name}}">
                </div>
                <div class="form-group">
                  <input type="checkbox" name="changeEmail" id="changeEmail">
                  <label for="Email">Đổi Email</label>
                  <input type="email" class="form-control email" name="Email" placeholder="Nhập email đăng nhập" disabled value="{{$admin->email}}">
                </div>
                <div class="form-group">
                  <input type="checkbox" name="changePass" id="changePass">
                  <label for="Password">Đổi mật khẩu</label>
                  <input type="password" class="form-control password" name="Password" placeholder="Nhập mật khẩu" disabled>
                </div>
                <div class="form-group">
                  <label for="Re-Password">Nhập lại mật khẩu</label>
                  <input type="password" class="form-control password" name="Re-Password" placeholder="Nhập lại mật khẩu" disabled>
                </div>
                <div class="form-group">
                  <input type="checkbox" name="changeAvatar" id="changeAvatar">
                  <label for="Avatar">Đổi Avatar</label>
                  <img src="upload/img/avatar/admin/{{$admin->avatar}}" alt="" width="100" id="avatar1"><br>
                  <input type="file" class="form-control avatar" name="Avatar" placeholder="Chọn ảnh làm avatar" disabled>
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
      $("#changeEmail").change(function(){
        if ($(this).is(":checked")){
          $(".email").removeAttr('disabled');
        }
        else {
          $(".email").attr('disabled','')
        }
      });
      $("#changeAvatar").change(function(){
        if ($(this).is(":checked")){
          $(".avatar").removeAttr('disabled');
          $("#avatar1").attr('class','hidden');
        }
        else {
          $(".avatar").attr('disabled','');
          $("#avatar1").removeAttr('class');
        }
      });
    });
  </script>
@endsection