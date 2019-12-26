@extends('layouts.admin.index')

@section('title', 'Danh sách thành viên')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thành viên
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Thành viên</a></li>
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
              <h3 class="box-title">Danh sách thành viên</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Họ Tên</th>
                  <th>Ngày Sinh</th>
                  <th>Giới Tính</th>
                  <th>Số Điện Thoại</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Avatar</th>
                  <th>Tên Đăng Nhập</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $d = 1?>
                @foreach($thanhvien as $tv)
                  <tr>
                    <td>{{$d++}}</td>
                    <td>{{$tv->hoten}}</td>
                    <td>{{date('d/m/Y', strtotime($tv->ngaysinh))}}</td>
                    <td>@if ($tv->gioitinh == 'Male') {{'Nam'}} @else {{'Nữ'}} @endif</td>
                    <td>{{$tv->sdt}}</td>
                    <td>{{$tv->diachi}}</td>
                    <td>{{$tv->email}}</td>
                    <td><img src="upload/img/avatar/thanhvien/{{$tv->avatar}}" width="50px"></td>
                    <td>{{$tv->tendangnhap}}</td>
                    <td><a href="admin/thanhvien/sua/{{$tv->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/thanhvien/xoa/{{$tv->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#table').DataTable();
} );
</script>
@endsection