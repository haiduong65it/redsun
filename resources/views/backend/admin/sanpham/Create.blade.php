@extends('layouts.admin.index')

@section('title', 'Thêm mới sản phẩm')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
        <small>Thêm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li class="active">Thêm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin: 0 auto; width: 60%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Thêm mới sản phẩm</h3>
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
            <form class="forms-sample" action="admin/sanpham/them" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="InputName">Tên sản phẩm</label>
                <input type="text" class="form-control" name="InputName" placeholder="Nhập Tên sản phẩm">
              </div>
              <div class="form-group">
                <label for="InputLSP">Chọn loại sản phẩm</label><br>
                  <select  class="form-control"  name="LSP" id="LSP">
                    @foreach($loaisanpham as $lsp)
                    <option value="{{$lsp->id}}">{{$lsp->id." - ".$lsp->tenloaisanpham}}</option>
                    @endforeach
                </select>
              <div class="form-group">
                <label for="InputTH">Chọn thương hiệu</label>
                <select  class="form-control"  name="TH" id="TH">
                  @foreach($thuonghieu as $th)
                  <option value="{{$th->id}}">{{$th->id." - ".$th->tenthuonghieu}}</option>
                  @endforeach
                </select>  
              </div>
              </div>
              <div class="form-group">
                <label for="InputBH">Chọn quá trình bảo hành</label>
                  <select  class="form-control"  name="BH" id="BH">
                    @foreach($baohanh as $bh)
                    <option value="{{$bh->id}}">{{$bh->id." - ".$bh->(.$ngaybatdau->ngaybatdau. - .$ngayketthuc ->ngayketthuc.)" tháng"}}</option>
                    @endforeach
                 </select>
              </div>
              <div class="chitietsanpham" style="float: left;width: 48%;margin: 1%">
                <div class="form-group">
                <label for="InputSize">Size</label>
                <input type="number" class="form-control" name="InputSize" placeholder="Nhập size">
              </div>
              <div class="form-group">
                <label for="InputMau">Mau</label>
                <input type="text" class="form-control" name="InputMau" placeholder="Nhập mau">
              </div>
              <div class="form-group">
                <label for="InputSL">Số lượng</label>
                <input type="number" class="form-control" name="InputSL" placeholder="Nhập số lượng">
              </div>
              <div class="form-group">
                <label for="InputDG">Đơn giá</label>
                <input type="number" class="form-control" name="InputDG" placeholder="Nhập đơn giá">
              </div>
              </div>              
              <button type="submit" class="btn btn-success mr-2">Thêm</button>
              <button type="reset" class="btn btn-light">Làm mới</button>
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

