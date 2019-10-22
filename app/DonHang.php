<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    //
    protected $table = "donhang";

    public function nhanvien()
    {
    	return $this->belongsTo('App\NhanVien','id_nhanvien','id');
    }

    public function thanhvien()
    {
    	return $this->belongsTo('App\ThanhVien','id_thanhvien','id');
    }

    public function ctdonhang()
    {
    	return $this->hasMany('App\CTDonHang','id_donhang','id');
    }
}
