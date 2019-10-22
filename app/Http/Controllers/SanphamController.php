<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanphamController extends Controller
{
    //
    public function list_products(){
    	$sanpham = SanPham::all();
    	return view('backend.admin.product.List', ['sanpham'=>$sanpham]);
    }
}
