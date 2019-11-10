@extends('layouts.admin.index')

@section('title', 'Đăng nhập Admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Đăng nhập</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Đăng nhập</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 style="margin:0 auto">Đăng nhập</h3>
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
            <form class="forms-sample" action="admin/login" method="POST" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="Email" placeholder="Nhập email đăng nhập">
              </div>
              <div class="form-group">
                <label for="Password">Mật Khẩu</label>
                <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu">
              </div>
              <button type="submit" class="btn btn-success mr-2"  @if (count($errors) <= 0) {{"onclick=myFunction()"}} @endif>Đăng nhập</button>
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
      alert('Đăng nhập thành công!!!!');
    }
  </script>
@endsection

