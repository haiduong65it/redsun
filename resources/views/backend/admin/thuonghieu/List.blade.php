@extends('layouts.admin.index')

@section('title', 'Danh sách loại sản phẩm')

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thương hiệu
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Thương hiệu</a></li>
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
              <h3 class="box-title">Danh sách thương hiệu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsth" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên thuong hiệu</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($thuonghieu as $th)
                  <tr>
                    <td>{{$th->id}}</td>
                    <td>{{$th->tenthuonghieu}}</td>
                    <td><a href="admin/thuonghieu/sua/{{$th->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/thuonghieu/xoa/{{$th->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dsth').DataTable();
} );
</script>
@endsection