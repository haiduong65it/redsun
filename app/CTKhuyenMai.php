<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTKhuyenMai extends Model
{
    //
    protected $table = "chitietkhuyenmai";

    public function sanpham()
    {
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function khuyenmai()
    {
    	return $this->belongsTo('App\KhuyenMai','id_khuyenmai','id');
    }
}
