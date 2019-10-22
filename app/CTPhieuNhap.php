<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTPhieuNhap extends Model
{
    //
    protected $table = "chitietphieunhap";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function phieunhap()
    {
    	return $this->belongsTo('App\PhieuNhap','id_phieunhap','id');
    }
}
