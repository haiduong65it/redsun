<?php

namespace App\Http\Controllers;
use App\LoaiSanPham;
use Illuminate\Http\Request;

class LoaisanphamController extends Controller
{
    //
    public function danhsach(){
    	$loaisanpham = LoaiSanPham::all();
    	return view('backend.admin.loaisanpham.List', ['loaisanpham'=>$loaisanpham]);
    }

    public function get_them(){
    	return view('backend.admin.loaisanpham.Create');
    }

    public function post_them(Request $request){
    	$this->validate($request,
        [
  
          'InputName' => 'required|min:5',
        ],
        [
          'InputName.required' => "Chưa nhập tên loại sản phẩm",
       
        ]); 	

    	$loaisanpham = new LoaiSanPham;
  		$loaisanpham->tenloaisanpham = $request->InputName;
  	  $loaisanpham->save();

      return redirect('admin/loaisanpham/them')->with('thongbao','Thêm loại sản phẩm thành công');
    }

    public function get_sua($id)
    {
      $loaisanpham = LoaiSanPham::find($id);
      return view('backend.admin.loaisanpham.Update', ['loaisanpham'=>$loaisanpham]);
    }

    public function post_sua(Request $request,$id)
    {
      $loaisanpham = LoaiSanPham::find($id);
        $this->validate($request,
        [
          'InputID.unique' => "tên loại sản phẩm này đã tồn tại",
          'InputID.required' => "Chưa nhập tên loại sản phẩm",
        ]);
        $loaisanpham->tenloaisanpham = $request->InputID;

      $loaisanpham->save();

      return redirect('admin/loaisanpham/danhsach')->with('thongbao',"Sửa thành công loại sản phẩm ".$loaisanpham->tenloaisanpham);
      
    }

    public function xoa($id)
    {
      $loaisanpham = LoaiSanPham::find($id);
      $tenloaisanpham = $loaisanpham->tenloaisanpham;
      $loaisanpham->delete();

      return redirect('admin/loaisanpham/danhsach')->with('thongbao',"Đã xóa thành loại sản phẩm ".$tenloaisanpham);
    }
}
