<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HinhAnh;
use App\SanPham;

class HinhanhController extends Controller
{
    function danhsach(){
        $hinhanh = HinhAnh::all();
        $sanpham = SanPham::all();
        return view('backend.admin.hinhanh.List',['hinhanh'=>$hinhanh, 'sanpham' =>$sanpham]);
    }
    
    function get_them(){
      $sanpham = SanPham::all();
      return view('backend.admin.hinhanh.Create',['sanpham'=>$sanpham]);
    }

    function post_them(Request $request){
      $this->validate($request,
        [
          'InputHienthi' => 'required',
          'InputHinh' => 'required',
          'InputMau' => 'required',
        ],
        [
          'InputHienthi.required' => "Chưa nhập hiển thị",
          'InputHinh.required' => "Chọn chọn file ảnh nào",
          'InputMau.required' => "Chưa nhập màu",
        ]);

      if ($request->hasfile('InputHinh')){
        foreach($request->file('InputHinh') as $file) {

          $duoi = $file->getClientOriginalExtension();
          if ($duoi != 'jpg' && $duoi != 'png'){
            return redirect('admin/hinhanh/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg/png');
          }
          $name = $file->getClientOriginalName();
          $Hinh = str_random(4)."_".$name;
          while(file_exists("upload/img/product/".$Hinh)){
              $Hinh = str_random(4)."_".$name;
          }
       
          $file->move('upload/img/product/', $Hinh);
          $hinhanh = new HinhAnh;
          $hinhanh->id_sanpham = $request->MaSP;
          $hinhanh->file_anh = $Hinh;
          $hinhanh->noihienthi = $request->InputHienthi;
          $hinhanh->mau = $request->InputMau;

          $hinhanh->save();
        }
      }

      return redirect('admin/hinhanh/them')->with('thongbao','Thêm hình ảnh thành công');

    }

    public function get_sua($id){
      $hinhanh = HinhAnh::find($id);
      $sanpham = SanPham::all();
      return view('backend.admin.hinhanh.Update',['hinhanh'=>$hinhanh,'sanpham'=>$sanpham]);
    }

    public function post_sua(Request $request, $id){
      $hinhanh = HinhAnh::find($id);
      $this->validate($request,
        [
          'InputHienthi' => 'required',
          'InputMau' => 'required',
        ],
        [
          'MaHA.required' => "Chưa nhập ghi chú",
          'InputMau.required' => "Chưa nhập màu",
        ]);

      $hinhanh->id_sanpham = $request->id;
      if ($request->hasfile('InputHinh')){
        $file = $request->file('InputHinh');

        $duoi = $file->getClientOriginalExtension();
        if ($duoi != 'jpg' && $duoi != 'png'){
          return redirect('admin/hinhanh/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg/png');
        }
        $name = $file->getClientOriginalName();
        $Hinh = str_random(4)."_".$name;
        while(file_exists("upload/img/product/".$Hinh)){
            $Hinh = str_random(4)."_".$name;
        }
     
        $file->move('upload/img/product/', $Hinh);
      }
      $hinhanh->ghichu = $request->InputHienthi;

      $hinhanh->save();

      return redirect('admin/hinhanh/danhsach')->with('thongbao',"Sửa thành công");
      
    }

    function xoa($id){
      $hinhanh = HinhAnh::find($id);
      $hinhanh->delete();

      return redirect('admin/hinhanh/danhsach')->with('thongbao',"Đã xóa thành công");
    }
}
