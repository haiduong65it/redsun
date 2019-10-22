<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTSanPham extends Model
{
    //
    protected $table = "chitietsanpham";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }
}
