@extends('layouts.admin.index')

@section('title', 'Cập nhật sản phẩm')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="col-lg-12 grid-margin stretch-card">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
        <small>Chỉnh sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li class="active">Sửa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Chỉnh sửa thông tin sản phẩm</h3>
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
            <form class="forms-sample" action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data" style="margin: 1%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             <div class="form-group">
              <label for="InputLSP">Chọn loai sản phẩm</label>
              <select  class="form-control"  name="LSP" id="LSP">
                @foreach($loaisanpham as $lsp)
                <option 
                  @if ($sanpham->id_loaisanpham == $lsp->id)
                    {{"selected"}}
                  @endif
                  value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="InputTH">Chọn thương hiệu</label>
              <select  class="form-control"  name="TH" id="TH">
                @foreach($thuonghieu as $th)
                <option 
                  @if ($sanpham->id_thuonghieu == $th->id)
                    {{"selected"}}
                  @endif
                  value="{{$th->id}}">{{$th->tenthuonghieu}}
                </option>
                @endforeach
              </select>
            </div>
           <div class="form-group">
                <label for="InputBH">Chọn quá trình bảo hành</label>
                  <select  class="form-control"  name="BH" id="BH">
                    @foreach($baohanh as $bh)
                    <option value="{{$bh->id}}">{{(strtotime($bh->ngayketthuc) - strtotime($bh->ngaybatdau))/(60 * 60 * 24)}} ngày</option>
                    @endforeach
                 </select>
              </div>
            <div class="form-group">
              <label for="InputDG">Đơn giá</label>
              <input type="number" class="form-control" name="InputDG" placeholder="Nhập đơn giá" value="{{$sanpham->dongia}}">
            </div>
              
            </form>
          </div>
          <!-- /.box -->
        </div>        
          <div class="button" style="width: 90%;"> 
            <button type="submit" class="btn btn-success mr-2 col-lg-6" style="margin: 5px 20px;">Thêm</button>
            <button type="reset" class="btn btn-light col-lg-6"  style="margin: 5px 20px;">Làm mới</button>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
</div>
    
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#changePass").change(function(){
        if ($(this).is(":checked")){
          $(".password").removeAttr('disabled');
        }
        else {
          $(".password").attr('disabled','')
        }
      });
      $("#changeID").change(function(){
        if ($(this).is(":checked")){
          $(".id").removeAttr('disabled');
        }
        else {
          $(".id").attr('disabled','')
        }
      });
    });
  </script>
@endsection
