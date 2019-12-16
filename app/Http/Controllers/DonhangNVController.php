<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DonHang;
use App\NhanVien;
use App\CTDonHang;

class DonhangNVController extends Controller
{
    
    function danhsach(){
        $donhang = donhang::where('TTDH','<>','')->get();
        return view('backend.admin.donhang.List',['donhang'=>$donhang]);
    }

    public function get_chitiet($id){
      $donhang = DonHang::find($id);
      $ctdonhang = CTDonHang::where('id',$id)->get();
      return view('admin/donhang/chitiet',['ctdonhang'=>$ctdonhang,'donhang'=>$donhang]);
    }

    public function get_capnhatTTDH($id){
      $donhang = DonHang::find($MaDH);
      return view('admin/donhang/ttdh',['donhang'=>$donhang]);
    }

    public function post_capnhatTTDH(Request $request, $id){
      $donhang = DonHang::find($id);

      $donhang->tinhtrangdonhang = $request->InputTTDH;
      $donhang->save();

      return redirect('admin/donhang/danhsach')->with('thongbao',"Đã cập nhật thành công");
      
    }
}

