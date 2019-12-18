@extends('layouts.admin.index')

@section('title', 'Cập nhật hình ảnh')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Hình ảnh
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Hình ảnh</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin hình ảnh</h3>
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
            <form class="forms-sample" action="admin/hinhanh/sua/{{$hinhanh->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             <div class="form-group">
              <label for="InputMaSP">Sản phẩm</label>
              <select  class="form-control"  name="MaSP" id="MaSP">
                @foreach($sanpham as $sp)
                  <option 
                    @if ($hinhanh->id_sanpham == $sp->id)
                      {{"selected"}}
                    @endif
                  value="{{$sp->id}}">{{$sp->id." - ".$sp->tensanpham}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="InputHinh">Hình ảnh</label>
              <p>
                <img src="upload/img/product/{{$hinhanh->file_anh}}">
              </p>
              <input type="file" class="form-control" name="InputHinh" >
            </div>
            <div class="form-group">
              <label for="InputHienthi">Ghi chú</label>
              <input type="text" class="form-control" name="InputHienthi" value="{{$hinhanh->noihienthi}}">
            </div>
            <div class="form-group">
              <label for="InputMau">Màu</label>
              <input type="text" class="form-control" name="InputMau" value="{{$hinhanh->mau}}">
            </div>
              <button type="submit" class="btn btn-success mr-2">Thay đổi</button>
              <button type="reset" class="btn btn-light">Làm mới</button>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
      </section>
  </div>
@endsection
