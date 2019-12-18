@extends('layouts.admin.index')

@section('title', 'Thêm mới phiếu nhập')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Phiếu nhập
        <small>Thêm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Phiếu nhập</a></li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Thêm mới phiếu nhập</h3>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                  {{$err}}<br>
                @endforeach
              </div>
            @endif

            @if (session('thongbao'))
              <div class="alert alert-success">
                {{session('thongbao')}}
              </div>
            @endif
            <form class="forms-sample" action="admin/phieunhap/them" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="infor" style="margin: 10px;">
                <h4>Chi tiết phiếu nhập</h4>
                <div class="detail row" style="border: 2px solid red;margin: 5px;width: 90%;">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="InputMaSP">Sản phẩm</label>
                      <select  class="form-control"  name="InputMaSP[]" id="MaSP">
                        @foreach($sanpham as $sp)
                          <option value="{{$sp->id}}">{{$sp->id." - ".$sp->tensanpham}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="InputMau">Màu</label>
                      <input type="text" class="form-control" name="InputMau[]" placeholder="Nhập màu">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="InputSize">Size</label>
                      <input type="number" class="form-control" name="InputSize[]" placeholder="Nhập size">
                    </div>
                    <div class="form-group">
                      <label for="InputSL">Số lượng</label>
                      <input type="number" class="form-control" name="InputSL[]" placeholder="Nhập số lượng">
                    </div>
                  </div>
                </div>
                <div id="detail"></div>
                <div id="close"></div>
                <a class="btn btn-success" id="add" style="float: right; margin: 10px"><i class="fa fa-plus"></i></a>
              </div>
              <button type="submit" class="btn btn-success mr-2" style="width: 100%;">Thêm</button>
              <button type="reset" class="btn btn-light" style="width: 100%">Làm mới</button>
            </form>
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
  <script>
    $(document).ready(function(){

      var d = 0;

      $("#add").click(function(){
        d++;

        $("#detail").append("<div id='add"+(d)+"'><button type='button' id='close"+(d)+"' style='float: right;'>&times;</button><div class='detail row' style='border: 2px solid red;margin: 5px;width: 90%;'><div class='col-sm-6'><div class='form-group'><label for='InputMaSP'>Sản phẩm</label><select  class='form-control'  name='InputMaSP[]' id='MaSP'>@foreach($sanpham as $sp)<option value='{{$sp->id}}''>{{$sp->id.' - '.$sp->tensanpham}}</option>@endforeach</select></div><div class='form-group'><label for='InputMau'>Màu</label><input type='text' class='form-control' name='InputMau[]' placeholder='Nhập màu'></div></div><div class='col-sm-6'><div class='form-group'><label for='InputSize'>Size</label><input type='number' class='form-control' name='InputSize[]' placeholder='Nhập size'></div><div class='form-group'><label for='InputSL'>Số lượng</label><input type='number' class='form-control' name='InputSL[]'' placeholder='Nhập số lượng'></div></div></div></div>");

        $("#close"+d).click(function(){
          $("#add"+d).remove();
        });

      });
      
    });

  </script>
@endsection
