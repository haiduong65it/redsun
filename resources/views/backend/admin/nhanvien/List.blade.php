@extends('layouts.admin.index')

@section('title', 'Danh sách nhân viên')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
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
              <table id="table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa chỉ</th>
                    <th>Avatar</th>
                    <th>Tên Đăng Nhập</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($nhanvien as $nv)
                  <tr>
                    <td>{{$nv->id}}</td>
                    <td>{{$nv->hoten}}</td>
                    <td>{{$nv->ngaysinh}}</td>
                    <td>{{$nv->gioitinh}}</td>
                    <td>{{$nv->sdt}}</td>
                    <td>{{$nv->diachi}}</td>
                    <td><img src="upload/img/avatar/nhanvien/{{$nv->avatar}}" width="100px"></td>
                    <td>{{$nv->tendangnhap}}</td>
                    <td>Chỉnh sửa</td>
                    <td>Xóa</td>
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
<script>
  $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
@endsection