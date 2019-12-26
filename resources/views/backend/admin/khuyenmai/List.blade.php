@extends('layouts.admin.index')

@section('title', 'Danh sách khuyến mãi')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Khuyến mãi
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Khuyến mãi</a></li>
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
              <table id="dskm" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Giảm giá</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Danh sách được nhận ưu đãi</th>  
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $d =1?>
                @foreach($khuyenmai as $km)
                  <tr>
                    <td>{{$d++}}</td>
                    <td>{{$km->giamgia}}</td>
                    <td>{{$km->ngaybatdau}}</td>
                    <td>{{$km->ngayketthuc}}</td>
                    <td class="center"><i class="fa fa-eye fa-fw"></i><a href="admin/khuyenmai/xemdssp/{{$km->id}}">Xem danh sách</a></td>
                    <td><a href="admin/khuyenmai/sua/{{$km->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/khuyenmai/xoa/{{$km->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dskm').DataTable();
} );
</script>
@endsection