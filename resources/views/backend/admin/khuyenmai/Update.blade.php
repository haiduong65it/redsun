@extends('layouts.admin.index')

@section('title', 'Cập nhật khuyến mãi')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Khuyến mãi
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Khuyến mãi</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin khuyến mãi</h3>
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
            <form class="forms-sample" action="admin/khuyenmai/sua/{{$khuyenmai->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-group">
                <label for="InputGG">Giảm giá</label>
                <input type="text" class="form-control" name="InputGG" placeholder="Nhập số giảm giá" value="{{$khuyenmai->giamgia}}">
              </div>
               <div class="form-group">
                <label for="InputFdate">Ngày bắt đầu</label>
                <input type="date" class="form-control" name="InputFdate" placeholder="Chọn ngày bắt đầu" value="{{$khuyenmai->ngaybatdau}}">
              </div>
              <div class="form-group">
                <label for="InputLdate">Ngày kết thúc</label>
                <input type="date" class="form-control" name="InputLdate" placeholder="Chọn ngày kết thúc" value="{{$khuyenmai->ngayketthuc}}">
              </div>
              <button type="submit" class="btn btn-success mr-2">Thay đổi</button>
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