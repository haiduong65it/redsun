@extends('layouts.admin.index')

@section('title', 'Danh sách nhân viên')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nhân viên
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nhân viên</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>
    @if (session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách nhân viên</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsnv" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Họ Tên</th>
                  <th>Ngày Sinh</th>
                  <th>Giới Tính</th>
                  <th>Số Điện Thoại</th>
                  <th>Địa chỉ</th>
                  <th>Avatar</th>
                  <th>Email</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nhanvien as $nv)
                  <tr>
                    <td>{{$nv->id}}</td>
                    <td>{{$nv->hoten}}</td>
                    <td>{{date('d/m/Y', strtotime($nv->ngaysinh))}}</td>
                    <td>@if ($nv->gioitinh == 'Male') {{'Nam'}} @else {{'Nữ'}} @endif</td>
                    <td>{{$nv->sdt}}</td>
                    <td>{{$nv->diachi}}</td>
                    <td><img src="upload/img/avatar/nhanvien/{{$nv->avatar}}" width="100px"></td>
                    <td>{{$nv->email}}</td>
                    <td><a href="admin/nhanvien/sua/{{$nv->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/nhanvien/xoa/{{$nv->id}}" class="btn btn-danger">Xóa</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
           
            </div>
            <!-- /.box-body -->
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
<script type="text/javascript">
  $(document).ready( function () {
    $('#dsnv').DataTable();
} );
</script>
@endsection