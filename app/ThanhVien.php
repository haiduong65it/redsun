<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    //
    protected $table = "thanhvien";

    public function binhluan()
    {
    	return $this->hasMany('App\BinhLuan','id_thanhvien','id');
    }

    public function DonHang()
    {
    	return $this->hasMany('App\DonHang','id_thanhvien','id');
    }
}
