@extends('layouts.admin.index')

@section('title', 'Chi tiết nhập kho')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Chu tiết nhập kho
        <small>Sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Chi tiết nhập kho</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Sửa chi tiết nhập kho</h3>
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
            <form class="forms-sample" action="admin/phieunhap/suact/{{$chitietphieunhap->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              @csrf
            <div class="form-group">
              <label for="InputSize">Size</label>
               <input type="number" class="form-control" name="InputSize" value="{{$chitietphieunhap->size}}">
            </div>
            <div class="form-group">
              <label for="InputMau">Màu</label>
               <input type="text" class="form-control" name="InputMau" value="{{$chitietphieunhap->mau}}">
            </div>
            <div class="form-group">
              <label for="InputSL">Số lượng</label>
               <input type="number" class="form-control" name="InputSL" value="{{$chitietphieunhap->soluong}}">
            </div>
              <button type="submit" class="btn btn-success mr-2">Sửa</button>
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

