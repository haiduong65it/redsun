<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ThanhVien extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hoten','ngaysinh', 'gioitinh', 'sdt', 'diachi', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function binhluan()
    {
    	return $this->hasMany('App\BinhLuan','id_thanhvien','id');
    }

    public function DonHang()
    {
    	return $this->hasMany('App\DonHang','id_thanhvien','id');
    }
}
