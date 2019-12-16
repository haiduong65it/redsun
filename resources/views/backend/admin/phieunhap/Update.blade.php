@extends('layouts.admin.index')

@section('title', 'Cập nhật phiếu nhập')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Phiếu nhập
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nhân viên</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin phiếu nhập</h3>
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
            <form class="forms-sample" action="admin/nhanvien/sua/{{$nhanvien->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="Inputdate">Ngày nhập kho</label>
                <input type="date" class="form-control" name="Inputdate" placeholder="Chọn ngày nhập kho" value="{{$nhapkho->create_at}}">
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
   </div>
    
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
@endsection

