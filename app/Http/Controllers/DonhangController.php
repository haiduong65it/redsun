<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DonHang;
use App\NhanVien;
use App\CTDonHang;

class DonhangController extends Controller
{
    
    function danhsach(){
        $donhang = DonHang::all();
        return view('backend.admin.donhang.List',['donhang'=>$donhang]);
    }

    public function get_duyet($id){
      $donhang = DonHang::find($id);
      $nhanvien = NhanVien::where('chucvu','Giao hang')->get();
      return view('admin/donhang/duyetdon',['donhang'=>$donhang,'nhanvien'=>$nhanvien]);
    }

    public function post_duyet(Request $request, $id){
      $donhang = DonHang::find($MaDH);

      $donhang->id_nhanvien = $request->nvgh;
      $donhang->tinhtrangdonhang = 'Đã duyệt';

      $donhang->save();

      return redirect('admin/donhang/danhsach')->with('thongbao',"Đã duyệt thành công");
      
    }

    public function get_chitiet($id){
      $donhang = DonHang::find($id);
      $ctdonhang = CTDonHang::where('id',$id)->get();
      return view('admin/donhang/chitiet',['ctdonhang'=>$ctdonhang,'donhang'=>$donhang]);
    }

    public function get_xoa($id){
      $donhang = DonHang::find($id);
      $donhang->delete();

      return redirect('admin/donhang/danhsach')->with('thongbao',"Đã xóa thành công");
    }

}

