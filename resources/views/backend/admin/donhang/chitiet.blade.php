@extends('layouts.admin.index')

@section('title', 'Chi tiết đơn hàng')

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết đơn hàng
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Chi tiết đơn hàng</a></li>
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
              <h3 class="box-title">Chi tiết đơn hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsctdh" class="table table-bordered table-hover">
                <thead>
                   <tr align="center">
                      <th>STT</th>
                      <th>Sản phẩm</th>
                      <th>Size</th>
                      <th>Màu</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                    </tr>                
                </thead>
                <tbody>
                  <?php $d = 1?>
                  @foreach($ctdonhang as $ct)
                  <tr class="odd gradeX">
                    <td>{{$d++}}</td>
                    <td>{{$ct->id_sanpham}}</td>
                    <td>{{$ct->size}}</td>
                    <td>{{$ct->mau}}</td>
                    <td>{{$ct->soluong}}</td>
                    <td>{{number_format($ct->dongia)}} VNĐ</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
           
            </div>
            <i class="fa fa-trash-o fa-fw"></i><a href="admin/donhang/danhsach">Quay lại danh sách</a>
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
    $('#dsctdh').DataTable();
} );
</script>
@endsection