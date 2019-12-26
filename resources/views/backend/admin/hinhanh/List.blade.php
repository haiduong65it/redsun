@extends('layouts.admin.index')

@section('title', 'Danh sách hình ảnh')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hình ảnh
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Hình ảnh</a></li>
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
              <h3 class="box-title">Danh sách hình ảnh</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsha" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Hiển thị</th>
                  <th>Màu</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $d =1 ?>
                @foreach($hinhanh as $ha)
                  <tr>
                     <td>{{$d++}}</td>
                    @foreach ($sanpham as $sp)
                      @if ($sp->id == $ha->id_sanpham) <td>{{$sp->tensanpham}}</td> 
                      @endif
                    @endforeach
                    <td>
                      <img src="upload/img/product/{{$ha->file_anh}}" height="50px">
                    </td>
                    <td>{{$ha->noihienthi}}</td>
                    <td>{{$ha->mau}}</td>
                    <td><a href="admin/hinhanh/sua/{{$ha->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/hinhanh/xoa/{{$ha->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dsha').DataTable();
} );
</script>
@endsection