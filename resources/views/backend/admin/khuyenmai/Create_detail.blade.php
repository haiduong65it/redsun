@extends('layouts.admin.index')

@section('title', 'Chi tiết khuyến mãi')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Chu tiết khuyến mãi
        <small>Thêm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Chi tiết khuyến mãi</a></li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Thêm mới chi tiết khuyến mãi</h3>
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
            <form class="forms-sample" action="admin/khuyenmai/themct/{{$khuyenmai->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="InputMaSP">Sản phẩm</label>
              <select  class="form-control"  name="InputMaSP" id="InputMaSP">
                @foreach($sanpham as $sp)
                  <option value="{{$sp->id}}">{{$sp->id." - ".$sp->tensanpham}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="InputInfo">Thông tin khuyến mãi</label>
              <textarea class="form-control" name="InputInfo" placeholder="Nhập thông tin khuyến mãi"></textarea>
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

