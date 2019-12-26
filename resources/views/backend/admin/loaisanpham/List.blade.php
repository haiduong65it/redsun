@extends('layouts.admin.index')

@section('title', 'Danh sách loại sản phẩm')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Loại sản phẩm
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Loại sản phẩm</a></li>
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
              <h3 class="box-title">Danh sách loại sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dslsp" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên loại sản phẩm</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $d = 1?>
                @foreach($loaisanpham as $lsp)
                  <tr>
                    <td>{{$d++}}</td>
                    <td>{{$lsp->tenloaisanpham}}</td>
                    <td><a href="admin/loaisanpham/sua/{{$lsp->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/loaisanpham/xoa/{{$lsp->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dslsp').DataTable();
} );
</script>
@endsection