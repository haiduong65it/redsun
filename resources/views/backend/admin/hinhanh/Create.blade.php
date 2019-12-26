@extends('layouts.admin.index')

@section('title', 'Thêm mới hình ảnh')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Hình ảnh
        <small>Thêm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Hình ảnh</a></li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Thêm mới hinh ảnh</h3>
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
            <form class="forms-sample" action="admin/hinhanh/them" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="InputMaSP">Sản phẩm</label>
                <select  class="form-control"  name="MaSP" id="MaSP">
                  @foreach($sanpham as $sp)
                    <option value="{{$sp->id}}">{{$sp->id." - ".$sp->tensanpham}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="InputHinh">Hình ảnh</label>
                <input type="file" class="form-control" name="InputHinh[]" multiple="multiple">
              </div>
              <div class="form-group">
                <label for="InputHienthi">Hiển thị</label>
                <input type="text" class="form-control" name="InputHienthi">
              </div>
              <div class="form-group">
                <label for="InputMau">Màu</label>
                <input type="text" class="form-control" name="InputMau">
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

