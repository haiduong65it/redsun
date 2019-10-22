<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    //
    protected $table = "hinhanh";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }
}
