@extends('layouts.admin.index')

@section('title', 'Cập nhật chi tiết sản phẩm')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h2>Chi tiết sản phẩm</h2>
      <p class="card-description">
          <code>{{$sanpham->tensanpham}}</code>  
      </p>
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
      <form class="forms-sample" action="admin/sanpham/xemct/{{$chitietsanpham->id}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="InputSize">Size</label>
          <input type="number" class="form-control" name="InputSize" placeholder="Nhập size" value="{{$chitietsanpham->size}}">
        </div>
        <div class="form-group">
          <label for="InputMau">Màu</label>
          <input type="text" class="form-control" name="InputMau" placeholder="Nhập màu" 
          value="{{$chitietsanpham->mau}}">
        </div>
        <div class="form-group">
          <label for="InputSL">Số lượng</label>
          <input type="number" class="form-control" name="InputMau" placeholder="Nhập màu" 
          value="{{$chitietsanpham->soluong}}">
        </div>
        <div class="form-group">
          <label for="InputDG">ĐƠn Giá</label>
          <input type="number" class="form-control" name="InputDG" placeholder="Nhập đơn giá"
          value="{{$chitietsanpham->dongia}}">
        </div>
        <button type="submit" class="btn btn-success mr-2" style="width: 100%;">Sửa</button>
        <button type="reset" class="btn btn-light" style="width: 100%;">Làm mới</button>
      </form>
      
    </div>
  </div>
</div>
@endsection