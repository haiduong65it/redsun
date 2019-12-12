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
                  value="{{$lsp->id}}">{{$lsp->id." - ".$lsp->tenloaisanpham}}
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
                  value="{{$th->id}}">{{$th->id." - ".$th->tenthuonghieu}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="InputBH">Chọn quá trình bảo hành</label>
              <select  class="form-control"  name="BH" id="BH">
                @foreach($baohanh as $bh)
                  <option 
                    @if ($sanpham->id_baohanh == $bh->id)
                      {{"selected"}}
                    @endif
                  value="{{$bh->id}}">{{$bh->id." - ".$bh->thoihan." tháng"}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="InputDG">Đơn giá</label>
              <input type="number" class="form-control" name="InputDG" placeholder="Nhập đơn giá" value="{{$sanpham->dongia}}">
            </div>
              <button type="submit" class="btn btn-success mr-2">Thay đổi</button>
              <button type="reset" class="btn btn-light">Làm mới</button>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3>Thông tin nhân viên</h3>
            </div>
            <div class="box-body">
              <form class="forms-sample">
                <div class="form-group">
                  <label for="InputName">Họ Tên</label>
                  <input type="text" class="form-control" name="InputName" placeholder="Nhập Họ và Tên" value="{{$nhanvien->hoten}}" disabled="">
                </div>
                <div class="form-group">
                  <label for="InputBirth">Ngày sinh</label>
                  <input type="date" class="form-control" name="InputBirth" placeholder="Chọn ngày sinh" value="{{$nhanvien->ngaysinh}}" disabled="">
                </div>
                <div class="form-group">
                  <label for="InputSex">Giới tính</label><br>
                  <select name="InputSex" disabled="">
                    <option value="Male" @if ($nhanvien->gioitinh == 'Male') {{"selected='selected'"}} @endif>Nam</option>
                    <option value="Female" @if ($nhanvien->gioitinh == 'Female') {{"selected='selected'"}} @endif>Nữ</option>
                    <option value="other" @if ($nhanvien->gioitinh == 'other') {{"selected='selected'"}} @endif>Khác</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="InputTel">Số điện thoại</label>
                  <input type="text" class="form-control" name="InputTel" placeholder="Nhập số điện thoại" value="{{$nhanvien->sdt}}" disabled="">
                </div>
                <div class="form-group">
                  <label for="InputAddress">Địa chỉ</label>
                  <input type="text" class="form-control" name="InputAddress" placeholder="Nhập địa chỉ" value="{{$nhanvien->diachi}}" disabled="">
                </div>
                <div class="form-group">
                  <label for="InputAvatar">Avatar</label>
                  <img src="upload/img/avatar/nhanvien/{{$nhanvien->avatar}}" height="100px">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
        
            </div>
    </section>
    <!-- /.content -->
  </div>
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
