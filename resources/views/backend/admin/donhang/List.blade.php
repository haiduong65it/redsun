@extends('layouts.admin.index')

@section('title', 'Danh sách đơn hàng')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn hàng
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Đơn hàng</a></li>
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
              <h3 class="box-title">Danh sách Đơn hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Phương thức thanh toán</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Chi tiết</th>
                    <th>Duyệt đơn hàng</th>  
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($donhang as $dh)
                  <tr class="odd gradeX">
                    <td>{{$dh->id}}</td>            
                    <td>{{$dh->hoten}}</td>
                    <td>{{$dh->sdt}}</td>
                    <td>{{$dh->diachi}}</td>
                    <td>{{$dh->phuongthucthanhtoan}}</td>
                    <td>{{$dh->ngaydat}}</td>
                    <td>{{number_format($dh->tongtien)}} VNĐ</td>
                    <td>@if ($dh->trangthaidonhang == 0) Chờ duyệt @elseif ($dh->trangthaidonhang == 1) Đã duyệt @endif</td>
                    <td class="center"><i class="fa fa-eye fa-fw"></i><a href="admin/donhang/chitiet/{{$dh->id}}">Xem chi tiết</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/donhang/duyetdon/{{$dh->id}}">Duyệt đơn hàng</a></td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/donhang/xoa/{{$dh->id}}">Xóa</a></td>
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
    $('#table').DataTable();
} );
</script>
@endsection