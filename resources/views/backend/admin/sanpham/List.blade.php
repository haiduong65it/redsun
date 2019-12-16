@extends('layouts.admin.index')

@section('title', 'Danh sách sản phẩm')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li class="active">Danh sách</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dssp" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Mã loại sản phẩm</th>
                  <th>Mã thương hiệu</th>
                  <th>Mã bảo hành</th>
                  <th>Chi tiết</th>
                  <th>Sửa</th>  
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($sanpham as $sp)
                  <tr class="odd gradeX">
                    <td>{{$sp->id}}</td>
                    <td>{{$sp->tensanpham}}</td>
                    <td>{{$sp->id_loaisanpham}}</td>
                    <td>{{$sp->id_thuonghieu}}</td>
                    <td>{{$sp->id_baohanh}}</td>
                    <td class="center"><i class="fa fa-eye fa-fw"></i><a href="admin/sanpham/xemct/{{$sp->id}}">Xem chi tiết</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/nhanvien/sua/{{$sp->id}}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/nhanvien/xoa/{{$sp->id}}">Xóa</a></td>
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