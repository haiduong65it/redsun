@extends('layouts.admin.index')

@section('title', 'Danh sách phiếu nhập')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Phiếu nhập
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Phiếu nhập</a></li>
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
              <h3 class="box-title">Danh sách phiếu nhập</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dspn" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Ngày nhập</th>
                  <th>Chi tiết nhập kho</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $d =1?>
                @foreach($phieunhap as $pn)
                  <tr>
                     <td>{{$d++}}</td>
                      <td>
                        @foreach ($user as $ad)
                          @if ($ad->id == $pn->id_users) 
                            {{$ad->name}}
                          @endif
                        @endforeach
                      </td>
                    <td>{{$pn->created_at}}</td>
                    <td class="center"><i class="fa fa-eye fa-fw"></i><a href="admin/phieunhap/chitiet/{{$pn->id}}">Xem chi tiết</a></td>
                    <td><a href="admin/phieunhap/sua/{{$pn->id}}" class="btn btn-success">Sửa</a></td>
                    <td><a href="admin/phieunhap/xoa/{{$pn->id}}" class="btn btn-danger">Xóa</a></td>
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
    $('#dspn').DataTable();
} );
</script>
@endsection