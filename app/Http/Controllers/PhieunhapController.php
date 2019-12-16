<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PhieuNhap;
use App\CTPhieuNhap;
use App\NhanVien;
use App\SanPham;
use Illuminate\Support\Facades\Auth;

class PhieunhapController extends Controller
{
    
    function danhsach(){
        $nhapkho = PhieuNhap::all();
        $nhanvien = NhanVien::all();
        return view('backend.admin.phieunhap.List',['phieunhap'=>$nhapkho,'nhanvien'=>$nhanvien]);
    }

    function get_them(){
      return view('backend.admin.phieunhap.Create');
    }

    function post_them(Request $request){
      $nhapkho = new PhieuNhap;
      $nhapkho->id_nhanvien = Auth::user()->email;
      $nhapkho->create_at = $request->Inputdate;

      $nhapkho->save();

      return redirect('admin/phieunhap/danhsach')->with('thongbao','Tạo mới 1 hóa đơn nhập kho thành công');

    }

    public function get_chitiet($id){
      $nhapkho = PhieuNhap::find($id);
      $ctnhapkho = CTPhieuNhap::where('id',$id)->get();
      $sanpham = SanPham::all();
      return view('admin/phieunhap/ctnhapkho',['chitietphieunhap'=>$ctnhapkho,'phieunhap'=>$nhapkho,'sanpham'=>$sanpham]);
    }

    public function get_sua($id){
      $nhapkho = PhieuNhap::find($id);
      return view('admin/phieunhap/sua',['phieunhap'=>$nhapkho]);
    }

    public function post_sua(Request $request, $id){
      $nhapkho = PhieuNhap::find($id);
      $nhapkho->create_at = $request->Inputdate;

      $nhapkho->save();

      return redirect('admin/phieunhap/danhsach')->with('thongbao',"Đã sửa thành công");
      
    }

    function get_xoa($id){
      $nhapkho = PhieuNhap::find($id);
      $nhapkho->delete();

      return redirect('admin/phieunhap/danhsach')->with('thongbao',"Đã xóa thành công");
    }

    function get_themCT($id){
      $sanpham = SanPham::all();
      $nhapkho = PhieuNhap::find($id);

      return view('admin/phieunhap/themct',['sanpham'=>$sanpham,'phieunhap'=>$nhapkho]);
    }

    function post_themCT(Request $request, $id){
      $this->validate($request,
        [
          'InputSize' => 'required',
          'InputMau' => 'required',
          'InputSL' => 'required',
        ],
        [
          'InputSize.required' => "Chưa nhập size",
          'InputMau.required' => "Chưa nhập màu",
          'InputSL.required' => "Chưa nhập số lượng",
        ]);

      $id_sanpham = $request->InputSP;
      $size = $request->InputSize;
      $mau = $request->InputMau;
      $soluong = $request->InputSL;

      $ctnhapkho = new CTPhieuNhap;
      $ctnhapkho->id = $id;
      $ctnhapkho->id_sanpham = $id_sanpham;
      $ctnhapkho->size = $size;
      $ctnhapkho->mau = $mau;
      $ctnhapkho->soluong = $soluong;
      $ctnhapkho->save();


      $sanpham = SanPham::find($id);
      $sanpham->soluong += $soluong;
      $sanpham->save();

      return redirect('admin/phieunhap/themct/'.$mank)->with('thongbao',"Thêm thành công");

    }

}

