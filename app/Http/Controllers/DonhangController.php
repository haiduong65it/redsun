<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\DonHang;
use App\NhanVien;
use App\CTDonHang;
use Illuminate\Support\Facades\Auth;

class DonhangController extends Controller
{
    
    function danhsach(){
        $donhang = DonHang::all();
        return view('backend.admin.donhang.List',['donhang'=>$donhang]);
    }

    public function duyet($id){
      $donhang = DonHang::find($id);

      $donhang->id_user = Auth::user()->id;
      $donhang->trangthaidonhang = 1;

      $donhang->save();

      $donhang = DonHang::all();

      return view('backend.admin.donhang.List',['donhang'=>$donhang])->with('thongbao',"Đã duyệt thành công");
      
    }

    public function get_chitiet($id){
      $donhang = DonHang::find($id);
      $ctdonhang = CTDonHang::where('id_donhang',$id)->get();
      return view('backend.admin.donhang.chitiet',['ctdonhang'=>$ctdonhang,'donhang'=>$donhang]);
    }

    public function get_xoa($id){
      $donhang = DonHang::find($id);
      $donhang->delete();

      return redirect('backend/admin/donhang/danhsach')->with('thongbao',"Đã xóa thành công");
    }

}

