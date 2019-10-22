<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTDonHang extends Model
{
    //
    protected $table = "chitietdonhang";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function donhang()
    {
    	return $this->belongsTo('App\DonHang','id_donhang','id');
    }
}
