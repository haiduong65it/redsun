<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    //
    protected $table = "thuonghieu";

    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_thuonghieu','id');
    }
}
