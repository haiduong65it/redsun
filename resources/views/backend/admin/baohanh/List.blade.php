@extends('layouts.admin.index')

@section('title', 'Danh sách bảo hành')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Bảo hành
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Bảo hành</a></li>
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
              <h3 class="box-title">Danh sách bảo hành</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsbh" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Thời hạn bắt đầu</th>
                  <th>Thời hạn kết thúc</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($baohanh as $bh)
                  <tr class="odd gradeX">
                    <td>{{$bh->id}}</td>
                    <td>{{$bh->ngaybatdau}}</td>
                    <td>{{$bh->ngayketthuc}}</td>
                    <td><a href="admin/baohanh/sua/{{$bh->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/baohanh/xoa/{{$bh->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dsbh').DataTable();
} );
</script>
@endsection