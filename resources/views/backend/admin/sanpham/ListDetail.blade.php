@extends('layouts.admin.index')

@section('title', 'Danh sách sản phẩm')

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết sản phẩm
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Chi tiết sản phẩm</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách chi tiết sản phẩm {{$sanpham->tensanpham}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dssp" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Mã chi tiết</th>
                  <th>Mã sản phẩm</th>
                  <th>Size</th>
                  <th>Màu</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Sửa</th>  
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($chitietsanpham as $ct)
                  <tr class="odd gradeX">
                    <td>{{$ct->id}}</td>
                    <td>{{$ct->id_sanpham}}</td>
                    <td>{{$ct->size}}</td>
                    <td>{{$ct->mau}}</td>
                    <td>{{$ct->soluong}}</td>
                    <td>{{$ct->dongia}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/sanpham/suact/{{$ct->id}}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/sanpham/xoact/{{$ct->id}}">Xóa</a></td>
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
    $('#dssp').DataTable();
} );
</script>
@endsection