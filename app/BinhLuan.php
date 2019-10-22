<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = "binhluan";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function admin()
    {
    	return $this->belongsTo('App\User','id_admin','id');
    }

    public function thanhvien()
    {
    	return $this->belongsTo('App\ThanhVien','id_thanhvien','id');
    }
}
