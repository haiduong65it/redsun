<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    //
    protected $table = "phieunhap";

    public function nhanvien()
    {
    	return $this->belongsTo('App\NhanVien','id_nhanvien','id');
    }

    public function ctphieunhap()
    {
    	return $this->hasMany('App\CTPhieuNhap','id_phieunhap','id');
    }
}
