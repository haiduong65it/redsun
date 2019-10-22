<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoHanh extends Model
{
    //
    protected $table = "baohanh";

    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_baohanh','id');
    }
}
