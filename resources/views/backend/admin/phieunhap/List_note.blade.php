@extends('layouts.admin.index')

@section('title', 'Chi tiết nhập kho')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperd">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chi tiết nhập kho
        <small>Danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Chi tiết nhập kho</a></li>
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
              <h3 class="box-title">Danh sách nhập kho</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dsctpn" class="table table-bordered table-hover">
                <thead>
               <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Số lượng</th>
                <th>Sửa</th>
                <th>Xóa</th>
              </tr>
                </thead>
                <tbody>
                  <?php $d = 1?>
                  @foreach($chitietphieunhap as $ct)
                  <tr class="odd gradeX">
                    <td>{{$d++}}</td>
                    <td>
                      @foreach($sanpham as $sp)
                        @if ($sp->id == $ct->id_sanpham)
                          {{$sp->tensanpham}}
                        @endif
                      @endforeach
                    </td>
                    <td>{{$ct->size}}</td>
                    <td>{{$ct->mau}}</td>
                    <td>{{$ct->soluong}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/phieunhap/suact/{{$ct->id}}">Sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/phieunhap/xoact/{{$ct->id}}">Xóa</a></td>
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
    $('#dsctpn').DataTable();
} );
</script>
@endsection