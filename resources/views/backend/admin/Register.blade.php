@extends('layouts.admin.index')

@section('title', 'Đăng kí Admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Đăng kí</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Đăng kí</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Đăng kí</h3>
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
            <form class="forms-sample" action="admin/register" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="Name">Họ Tên</label>
                <input type="text" class="form-control" name="Name" placeholder="Nhập Họ và Tên">
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="Email" placeholder="Nhập email đăng nhập">
              </div>
              <div class="form-group">
                <label for="Password">Mật Khẩu</label>
                <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu">
              </div>
              <div class="form-group">
                <label for="Re-Password">Mật Khẩu</label>
                <input type="password" class="form-control" name="Re-Password" placeholder="Nhập lại mật khẩu">
              </div>
              <div class="form-group">
                <label for="Avatar">Avatar</label>
                <input type="file" class="form-control" name="Avatar" placeholder="Chọn ảnh làm avatar">
              </div>
              <button type="submit" class="btn btn-success mr-2"  @if (count($errors) <= 0) {{"onclick=myFunction()"}} @endif>Đăng kí</button>
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
  <script>
    function myFunction()
    {
      alert('Đăng kí thành công!!\nBây giờ bạn có thể đăng nhập bằng tài khoản vừa đăng kí!!');
    }
  </script>
@endsection

