<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    //
    protected $table = "khuyenmai";

    public function ctkhuyenmai()
    {
    	return $this->hasMany('App\CTKhuyenMai','id_khuyenmai','id');
    }
}
