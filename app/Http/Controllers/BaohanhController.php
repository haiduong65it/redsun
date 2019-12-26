<?php

namespace App\Http\Controllers;
use App\BaoHanh;
use Illuminate\Http\Request;

class BaohanhController extends Controller
{
    function danhsach(){
        $baohanh = BaoHanh::all();
        return view('backend.admin.baohanh.List',['baohanh'=>$baohanh]);
    }
    
    public function get_them(){
      return view('backend.admin.baohanh.Create');
    }

    function post_them(Request $request){
      $this->validate($request,
        [
          /*'InputMaBH' => 'unique:baohanh,MaBH|required|max:5',*/
          'InputTHBD' => 'required|after:today',
          'InputTHKT' => 'required|after:InputTHBD',
        ],
        [
         /* 'InputMaBH.unique' => "Mã bảo hành này đã tồn tại",
          'InputMaBH.required' => "Chưa nhập mã bảo hành",
          'InputMaBH.max' => "Mã bảo hành chứa tối đa 5 kí tự",         */
          'InputTHBD.required' => "Chưa chọn ngày áp dụng",
          'InputTHBD.after' => "Ngày áp dụng phải chọn sau ngày hôm nay",
          'InputTHKT.required' => "Chưa chọn ngày kết thúc",
          'InputTHKT.after' => "Ngày kết thúc phải chọn sau ngày áp dụng",
        ]);

      $baohanh = new BaoHanh;
      $baohanh->id = $request->InputMaBH;
      $baohanh->ngaybatdau = $request->InputTHBD;
      $baohanh->ngayketthuc = $request->InputTHKT;

      $baohanh->save();

      return redirect('admin/baohanh/them')->with('thongbao','Thêm chương trình bảo hành thành công');

    }

    public function get_sua($id){
      $baohanh = BaoHanh::find($id);
      return view('backend.admin.baohanh.Update',['baohanh'=>$baohanh]);
    }

    public function post_sua(Request $request, $id){
      $baohanh = BaoHanh::find($id);
      $this->validate($request,
        [
          'InputTHBD' => 'required|after:today',
          'InputTHKT' => 'required|after:InputTHBD',
        ],
        [        
          'InputTHBD.required' => "Chưa chọn ngày áp dụng",
          'InputTHBD.after' => "Ngày áp dụng phải chọn sau ngày hôm nay",
          'InputTHKT.required' => "Chưa chọn ngày kết thúc",
          'InputTHKT.after' => "Ngày kết thúc phải chọn sau ngày áp dụng",
        ]);

       $baohanh->ngaybatdau = $request->InputTHBD;
       $baohanh->ngayketthuc = $request->InputTHKT;

      $baohanh->save();

      return redirect('admin/baohanh/danhsach')->with('thongbao',"Sửa thành công");
      
    }

    function xoa($id){
      $baohanh = BaoHanh::find($id);
      $baohanh->delete();

      return redirect('admin/baohanh/danhsach')->with('thongbao',"Đã xóa thành công");
    }
}
