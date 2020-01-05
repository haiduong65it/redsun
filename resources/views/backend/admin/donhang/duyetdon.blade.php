@extends('layouts.admin.index')

@section('title', 'Đơn hàng')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn hàng
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Đơn hàng</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin đơn hàng</h3>
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
            <form class="forms-sample" action="admin/donhang/sua/{{$donhang->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <div class="form-group">
                <label for="InputIDNV">Nhân viên</label>
                <select  class="form-control"  name="nv" id="nv">
                  @foreach($nhanvien as $nv)
                  <option value="{{$nv->id_nhanvien}}">{{$nv->hoten}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-success mr-2">Duyệt</button>
              <button type="reset" class="btn btn-light">Làm mới</button>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section> 
</div>    
@endsection