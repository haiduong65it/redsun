<?php

namespace App\Http\Controllers;

use App\SanPham;
use App\KhuyenMai;
use App\CTKhuyenMai;

use Illuminate\Http\Request;

class KhuyenmaiController extends Controller
{

    public function danhsach(){
        $khuyenmai = KhuyenMai::all();
        return view('backend.admin.khuyenmai.List',['khuyenmai'=>$khuyenmai]);
    }

    function get_them(){
      return view('backend.admin.khuyenmai.Create');
    }

    function post_them(Request $request){
      $this->validate($request,
        [
          'InputGG' => 'required',
          'InputFdate' => 'required|after:today',
          'InputLdate' => 'required|after:InputFdate',          
        ],
        [
          'InputGG.required' => "CHưa nhập số giảm giá" ,
          'InputFdate.required' => "Chưa chọn ngày bắt đầu",
          'InputFdate.after' => "Ngày áp dụng phải chọn sau ngày hôm nay",
          'InputLdate.required' => "Chưa chọn ngày kết thúc",
          'InputLdate.after' => "Ngày kết thúc phải chọn sau ngày áp dụng",
        ]);

      $khuyenmai = new KhuyenMai;
      $khuyenmai->giamgia = $request->InputGG;
      $khuyenmai->ngaybatdau = $request->InputFdate;
      $khuyenmai->ngayketthuc = $request->InputLdate;     

      $khuyenmai->save();

      return redirect('admin/khuyenmai/danhsach')->with('thongbao','Thêm thành công');

    }

    public function get_sua($id){
      $khuyenmai = KhuyenMai::find($id);
      return view('backend.admin.khuyenmai.Update',['khuyenmai'=>$khuyenmai]);
    }

    public function post_sua(Request $request, $id){
      $khuyenmai = KhuyenMai::find($id);
      $this->validate($request,
        [
          'InputGG' => 'required',
          'InputFdate' => 'required|after:today',
          'InputLdate' => 'required|after:InputFdate',
        ],
        [
          'InputGG.required' => "CHưa nhập số giảm giá" ,
          'InputFdate.required' => "Chưa chọn ngày bắt đầu",
          'InputFdate.after' => "Ngày áp dụng phải chọn sau ngày hôm nay",
          'InputLdate.required' => "Chưa chọn ngày kết thúc",
          'InputLdate.after' => "Ngày kết thúc phải chọn sau ngày áp dụng",
        ]);

      $khuyenmai->giamgia = $request->InputGG;
      $khuyenmai->ngaybatdau = $request->InputFdate;
      $khuyenmai->ngayketthuc = $request->InputLdate;

      $khuyenmai->save();

      return redirect('admin/khuyenmai/danhsach')->with('thongbao',"Sửa thành công");
      
    }

    public function get_xoa($id){
      $khuyenmai = KhuyenMai::find($id);
      $khuyenmai->delete();
      return redirect('admin/khuyenmai/danhsach')->with('thongbao',"Đã xóa thành công");
    }

    public function get_dssp($id){
      $khuyenmai = KhuyenMai::find($id);
      $chitietkhuyenmai = CTKhuyenMai::where('id', '=', $id)->get();
      return view('backend.admin.khuyenmai.List_products',['chitietkhuyenmai'=>$chitietkhuyenmai,'khuyenmai'=>$khuyenmai]);
    }

    public function get_themct($id){
      $sanpham = SanPham::all();
      $khuyenmai = KhuyenMai::find($id);
      return view('backend.admin.khuyenmai.Create_detail',['sanpham'=>$sanpham,'khuyenmai'=>$khuyenmai]);
    }

    public function post_themct(Request $request, $id){
      $this->validate($request,
        [
          'InputInfo' => 'required',
        ],
        [
          'InputInfo.required' => "Chưa nhập thông tin khuyến mãi",
        ]);
      $chitietkhuyenmai = CTKhuyenMai::all();
      $d = 0;
      foreach ($chitietkhuyenmai as $ctkm) {
        if ($ctkm->id == $id and $ctkm->id_sanpham == $request->InputMaSP) {
          $d++;
        }
      }
      if ($d == 0){
        $chitiet = new CTKhuyenMai;

        $chitiet->id = $id;
        $chitiet->id_sanpham = $request->InputMaSP;
        $chitiet->thongtinkhuyenmai = $request->InputInfo;

        $chitiet->save();
        return redirect('admin/khuyenmai/xemdssp/'.$id)->with('thongbao',"Thêm thành công");
      }
      else 
        return redirect('admin/khuyenmai/themct/'.$id)->with('thongbao',"Sản phẩm được chọn đã nằm trong chương trình khuyễn mãi này, vui lòng chọn sản phẩm khác");
    }

    public function get_xoact($id){
      $ctkm = CTKhuyenMai::find($id);
      $id = $ctkm->id;
      $ctkm->delete();
      return redirect('admin/khuyenmai/xemdssp/'.$id)->with('thongbao',"Xóa thành công"); 
    }
}
