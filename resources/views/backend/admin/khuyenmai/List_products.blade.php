@extends('layouts.admin.index')

@section('title', 'Chi tiết khuyến mãi')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết khuyến mãi
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Chi tiết khuyến mãi</a></li>
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
              <h3 class="box-title">Danh sách khuyến mãi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsctkm" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã sản phẩm</th>
                  <th>Thông tin khuyến mãi</th>
                  <th><i class="fa fa-plus-circle fa-fw"></i><a href="admin/khuyenmai/themct/{{$khuyenmai->id}}">Thêm</a></th>  
                </tr>
                </thead>
                <tbody>
                  <?php $d = 1?>
                @foreach($chitietkhuyenmai as $ctkm)
                  <tr class="odd gradeX"  >
                    <td>{{$d++}}</td>
                    <td>{{$ctkm->id_sanpham}}</td>
                    <td>{{$ctkm->thongtinkhuyenmai}}</td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/khuyenmai/xoact/{{$ctkm->id}}">Xóa</a></td>
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
    $('#dsctkm').DataTable();
} );
</script>
@endsection