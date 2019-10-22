<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = "sanpham";
    
    public function ctsanpham()
    {
    	return $this->hasMany('App\CTSanPham','id_sanpham','id');
    }

    public function binhluan()
    {
    	return $this->hasMany('App\BinhLuan','id_sanpham','id');
    }

    public function ctphieunhap()
    {
    	return $this->hasMany('App\CTPhieuNhap','id_sanpham','id');
    }

    public function ctkhuyenmai()
    {
    	return $this->hasMany('App\CTKhuyenMai','id_sanpham','id');
    }

    public function hinhanh()
    {
    	return $this->hasMany('App\HinhAnh','id_sanpham','id');
    }

    public function ctdonhang()
    {
    	return $this->hasMany('App\CTDonHang','id_sanpham','id');
    }

    public function loaisanpham()
    {
    	return $this->belongsTo('App\LoaiSanPham','id_loaisanpham','id');
    }

    public function baohanh()
    {
    	return $this->belongsTo('App\BaoHanh','id_baohanh','id');
    }

    public function thuonghieu()
    {
    	return $this->belongsTo('App\ThuongHieu','id_thuonghieu','id');
    }
}
