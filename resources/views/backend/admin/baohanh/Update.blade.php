@extends('layouts.admin.index')

@section('title', 'Cập nhật bảo hành')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bảo hành
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Bảo hành</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin bảo hành</h3>
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
            <form class="forms-sample" action="admin/baohanh/sua/{{$baohanh->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="InputTHBD">Thời hạn bắt đầu (tháng)</label>
                <input type="date" class="form-control" name="InputTHBD" placeholder="Nhập thời hạn bắt đầu" value="{{$baohanh->ngaybatdau}}">
              </div>
              <div class="form-group">
                <label for="InputTHKT">Thời hạn kết thúc (tháng)</label>
                <input type="date" class="form-control" name="InputTHKT" placeholder="Nhập thời hạn kết thúc" value="{{$baohanh->ngayketthuc}}">
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
