<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PhieuNhap;
use App\CTPhieuNhap;
use App\User;
use App\SanPham;
use Illuminate\Support\Facades\Auth;

class PhieunhapController extends Controller
{
    
    function danhsach(){
        $nhapkho = PhieuNhap::all();
        $user = User::all();
        return view('backend.admin.phieunhap.List',['phieunhap'=>$nhapkho,'user'=>$user]);
    }

    function get_them(){
      $sanpham = SanPham::all();
      return view('backend.admin.phieunhap.Create', ['sanpham' => $sanpham]);
    }

    function post_them(Request $request){
      $nhapkho = new PhieuNhap;
      $nhapkho->id_nhanvien = Auth::user()->id;
      $nhapkho->save();

      foreach ($request->InputMaSP as $key => $value) {
        # code...
        $ctphieunhap = new CTPhieuNhap;
        $ctphieunhap->size = $value;
        $ctphieunhap->mau = $request->InputMau[$key];
        $ctphieunhap->soluong = $request->InputSL[$key];
        $ctphieunhap->id_sanpham = $value;
        $ctphieunhap->id_phieunhap = $nhapkho->id;

        $ctphieunhap->save();
      }

      return redirect('admin/phieunhap/danhsach')->with('thongbao','Tạo mới 1 hóa đơn nhập kho thành công');

    }

    public function get_chitiet($id){
      $nhapkho = PhieuNhap::find($id);
      $ctnhapkho = CTPhieuNhap::where('id_phieunhap',$id)->get();
      $sanpham = SanPham::all();
      return view('backend.admin.phieunhap.List_note',['chitietphieunhap'=>$ctnhapkho,'phieunhap'=>$nhapkho,'sanpham'=>$sanpham]);
    }

    public function get_sua($id){
      $nhapkho = PhieuNhap::find($id);
      return view('backend.admin.phieunhap.Update',['phieunhap'=>$nhapkho]);
    }

    public function post_sua(Request $request, $id){
      $nhapkho = PhieuNhap::find($id);
      $nhapkho->created_at = $request->Inputdate;

      $nhapkho->save();

      return redirect('admin/phieunhap/danhsach')->with('thongbao',"Đã sửa thành công");
      
    }

    function get_xoa($id){
      $nhapkho = PhieuNhap::find($id);
      $nhapkho->delete();

      return redirect('admin/phieunhap/danhsach')->with('thongbao',"Đã xóa thành công");
    }

}

