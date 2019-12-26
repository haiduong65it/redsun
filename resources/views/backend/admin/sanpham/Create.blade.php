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
    <section class="content">
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
      <div class="box">
        <form class="forms-sample row" action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="col-xs-6">
            <div class="infor" style="margin: 10px;">
              <h4>Sản Phẩm</h4>
              <div class="form-group">
                <label for="InputName">Tên sản phẩm</label>
                <input type="text" class="form-control" name="InputName" placeholder="Nhập Tên sản phẩm">
              </div>
              <div class="form-group">
                <label for="InputLSP">Chọn loại sản phẩm</label>
                  <select  class="form-control"  name="LSP" id="LSP">
                    @foreach($loaisanpham as $lsp)
                    <option value="{{$lsp->id}}">{{$lsp->id." - ".$lsp->tenloaisanpham}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="InputTH">Chọn thương hiệu</label>
                <select  class="form-control"  name="TH" id="TH">
                  @foreach($thuonghieu as $th)
                  <option value="{{$th->id}}">{{$th->id." - ".$th->tenthuonghieu}}</option>
                  @endforeach
                </select>  
              </div>
              <div class="form-group">
                <label for="InputBH">Chọn quá trình bảo hành</label>
                  <select  class="form-control"  name="BH" id="BH">
                    @foreach($baohanh as $bh)
                    <option value="{{$bh->id}}">{{$bh->id}}<td>{{(strtotime($bh->ngayketthuc) - strtotime($bh->ngaybatdau))/(60*60*24)}}</td></option>
                    @endforeach
                  {{--   @foreach($baohanh as $bh) 
                        @if ($bh->id == $sp->id_baohanh) <td>{{(strtotime($bh->ngayketthuc) - strtotime($bh->ngaybatdau))/(60*60*24)}}</td> 
                        <option value="{{$bh->id== $sp->id_baohanh}}">{{$sp->id_baohanh}}</option>
                        @endif
                      @endforeach --}}

                 </select>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="infor" style="margin: 10px;">
              <h4>Chi tiết sản phẩm</h4>
              <div class="detail row" style="border: 2px solid red;margin: 5px;width: 90%;">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="InputSize">Size</label>
                    <input type="number" class="form-control" name="InputSize[]" placeholder="Nhập size">
                  </div>
                  <div class="form-group">
                    <label for="InputMau">Màu</label>
                    <input type="text" class="form-control" name="InputMau[]" placeholder="Nhập màu">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="InputSL">Số lượng</label>
                    <input type="number" class="form-control" name="InputSL[]" placeholder="Nhập số lượng">
                  </div>
                  <div class="form-group">
                    <label for="InputDG">Đơn giá</label>
                    <input type="number" class="form-control" name="InputDG[]" placeholder="Nhập đơn giá">
                  </div>
                </div>
              </div>
              <div id="detail"></div>
              <div id="close"></div>
              <a class="btn btn-success" id="add" style="margin-left: 210px"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          <div class="button" style="width: 90%;"> 
            <button type="submit" class="btn btn-success mr-2 col-lg-6" style="margin: 5px 20px;">Thêm</button>
            <button type="reset" class="btn btn-light col-lg-6"  style="margin: 5px 20px;">Làm mới</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
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

        $("#detail").append("<div id='add"+(d)+"'><button type='button' id='close"+(d)+"' style='float: right;'>&times;</button><div class='detail row' style='border: 2px solid red;margin: 5px;width: 90%;'><div class='col-sm-6'><div class='form-group'><label for='InputSize'>Size</label><input type='number' class='form-control' name='InputSize[]' placeholder='Nhập size'></div><div class='orm-group'><label for='InputMau'>Màu</label><input type='text' class='form-control' name='InputMau[]' placeholder='Nhập màu'></div></div><div class='col-sm-6'><div class='form-group'><label for='InputSL'>Số lượng</label><input type='number' class='form-control' name='InputSL[]' placeholder='Nhập số lượng'></div><div class='form-group'><label for='InputDG'>Đơn giá</label><input type='number' class='form-control' name='InputDG[]' placeholder='Nhập đơn giá'></div></div></div></div>");

        $("#close"+d).click(function(){
          $("#add"+d).remove();
        });

      });
      
    });

  </script>
@endsection

