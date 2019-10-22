<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = "nhanvien";

    public function donhang()
    {
    	return $this->hasMany('App\DonHang','id_donhang','id');
    }

    public function phieunhap()
    {
    	return $this->hasMany('App\PhieuNhap','id_phieunhap','id');
    }
}
