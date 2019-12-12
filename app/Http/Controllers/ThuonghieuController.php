<?php

namespace App\Http\Controllers;
use App\ThuongHieu;
use Illuminate\Http\Request;

class ThuonghieuController extends Controller
{
    //
    public function danhsach(){
    	$thuonghieu = ThuongHieu::all();
    	return view('backend.admin.thuonghieu.List', ['thuonghieu'=>$thuonghieu]);
    }

    public function get_them(){
    	return view('backend.admin.thuonghieu.Create');
    }

    public function post_them(Request $request){
    	$this->validate($request,
        [
  
          'InputName' => 'required',
        ],
        [
          'InputName.required' => "Chưa nhập tên thương hiệu",
       
        ]); 	

    	$thuonghieu = new ThuongHieu;
  		$thuonghieu->tenthuonghieu = $request->InputName;
  	  $thuonghieu->save();

      return redirect('admin/thuonghieu/them')->with('thongbao','Thêm thương hiệu thành công');
    }

    public function get_sua($id)
    {
      $thuonghieu = ThuongHieu::find($id);
      return view('backend.admin.thuonghieu.Update', ['thuonghieu'=>$thuonghieu]);
    }

    public function post_sua(Request $request,$id)
    {
      $thuonghieu = ThuongHieu::find($id);
        $this->validate($request,
        [
          'InputID.unique' => "tên thương hiệu này đã tồn tại",
          'InputID.required' => "Chưa nhập tên thương hiệu",
        ]);

        $thuonghieu->tenthuonghieu = $request->InputID;

      $thuonghieu->save();

      return redirect('admin/thuonghieu/danhsach')->with('thongbao',"Sửa thành công thương hiệu ".$thuonghieu->tenthuonghieu);
      
    }

    public function xoa($id)
    {
      $thuonghieu = ThuongHieu::find($id);
      $tenthuonghieu = $thuonghieu->tenthuonghieu;
      $thuonghieu->delete();

      return redirect('admin/thuonghieu/danhsach')->with('thongbao',"Đã xóa thành thương hiệu ".$tenthuonghieu);
    }
}
