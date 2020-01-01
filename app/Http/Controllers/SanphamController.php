<?php

namespace App\Http\Controllers;
use App\SanPham;
use App\CTSanPham;
use App\LoaiSanPham;
use App\BaoHanh;
use App\ThuongHieu;
use Illuminate\Http\Request;


class SanphamController extends Controller
{

  function danhsach(){
      $sanpham = SanPham::all();
      $loaisanpham = LoaiSanPham::all();
      $thuonghieu = ThuongHieu::all();
      $baohanh = BaoHanh::all();
      return view('backend.admin.sanpham.List',['sanpham'=>$sanpham, 'loaisanpham'=>$loaisanpham,'thuonghieu'=>$thuonghieu,'baohanh'=>$baohanh]);
  }

  function get_them(){
    $loaisanpham = LoaiSanPham::all();
    $thuonghieu = ThuongHieu::all();
    $baohanh = BaoHanh::all();
    return view('backend.admin.sanpham.Create',['loaisanpham'=>$loaisanpham,'thuonghieu'=>$thuonghieu,'baohanh'=>$baohanh]);
  }

  function post_them(Request $request){
    $this->validate($request,
      [
        'InputName' => 'required|min:2',
        // 'InputDongia' => 'required',
        // 'InputSize' => 'required',
        // 'InputMau' => 'required',
        // 'InputSL' => 'required',
      ],
      [
        'InputName.required' => "Chưa nhập tên sản phẩm",
        'InputName.min' => "Tên sản phẩm chứa ít nhất 2 kí tự",
        // 'InputDG.required' => "Chưa nhập đơn giá",
        // 'InputSize.required' => "Chưa nhập size",
        // 'InputMau.required' => "Chưa nhập màu",
        // 'InputSL.required' => "Chưa nhập số lượng",  
      ]);        

    $sanpham = new SanPham;
    $sanpham->tensanpham = $request->InputName;
    $sanpham->id_loaisanpham = $request->LSP;
    $sanpham->id_thuonghieu= $request->TH;
    $sanpham->id_baohanh = $request->BH;

    $sanpham->save();
    foreach ($request->InputSize as $key => $value) {
      # code...
      $chitietsanpham = new CTSanpham;
      $chitietsanpham->size = $value;
      $chitietsanpham->mau = $request->InputMau[$key];
      $chitietsanpham->soluong = $request->InputSL[$key];
      $chitietsanpham->dongia = $request->InputDG[$key];
      $chitietsanpham->id_sanpham = $sanpham->id;

      $chitietsanpham->save();
    }
    

    return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm thành công sản phẩm '.$sanpham->tensanpham);

  }

  public function get_sua($id)
  {
    $sanpham = SanPham::find($id);
    $loaisanpham = LoaiSanPham::all();
    $thuonghieu = ThuongHieu::all();
    $baohanh = BaoHanh::all();
    $chitietsanpham = CTSanPham::all();
    return view('backend.admin.sanpham.Update', ['sanpham'=>$sanpham,'loaisanpham'=>$loaisanpham,'thuonghieu'=>$thuonghieu,'baohanh'=>$baohanh,'chitietsanpham'=>$chitietsanpham]);
  }

  public function post_sua(Request $request, $id){
    $sanpham = SanPham::find($id);
    $this->validate($request,
      [
        'InputName' => 'required|min:2',
        'InputDongia' => 'required',
      ],
      [
        'InputName.required' => "Chưa nhập tên sản phẩm",
        'InputName.min' => "Tên sản phẩm chứa ít nhất 2 kí tự",
        'InputDongia.required' => "Chưa nhập đơn giá",
      ]);

    $sanpham->tensanpham = $request->InputName;
    $sanpham->id_loaisanpham = $request->LSP;
    $sanpham->id_thuonghieu = $request->TH;
    $sanpham->id_baohanh = $request->BH;

    $sanpham->save();

    return redirect('admin/sanpham/danhsach')->with('thongbao',"Sửa thành công sản phẩm ".$sanpham->tensp);
    
  }

  public function xoa($id){
    $sanpham = SanPham::find($id);
    $id_sanpham = $chitietsanpham->id_sanpham;
    $sanpham->delete();

    $chitietsanpham = CTSanPham::find($id_sanpham);
    $chitietsanpham->delete();

    return redirect('admin/sanpham/danhsach')->with('thongbao',"Đã xóa thành công");
  }

  public function get_chitiet($id){
    $sanpham = SanPham::find($id);
    $chitietsanpham = CTSanPham::where('id_sanpham',$id)->get();
    return view('backend.admin.sanpham.ListDetail',['chitietsanpham'=>$chitietsanpham,'sanpham'=>$sanpham]);
  }

  public function get_suact($id){
    $ctsanpham = CTSanPham::find($id);
    $sanpham = SanPham::find($ctsanpham->id_sanpham);
    return view('backend.admin.sanpham.Detail',['chitietsanpham'=>$ctsanpham, 'sanpham'=>$sanpham]);
  }

  public function post_suact(Request $request, $id){
    $chitietsanpham = CTSanPham::find($id);
    $this->validate($request,
      [
        'InputDG' => 'required',
        'InputSize' => 'required',
        'InputMau' => 'required',
        'InputSL' => 'required',
      ],
      [
        'InputDG.required' => "Chưa nhập đơn giá",
        'InputSize.required' => "Chưa nhập size",
        'InputMau.required' => "Chưa nhập màu",
        'InputSL.required' => "Chưa nhập số lượng",
      ]);

    $chitietsanpham->dongia = $request->InputDG;
    $chitietsanpham->size = $request->InputSize;
    $chitietsanpham->mau = $request->InputMau;
    $chitietsanpham->soluong = $request->InputSL;

    $chitietsanpham->save();

    return redirect('admin/sanpham/danhsach')->with('thongbao',"Sửa thành công chi tiết sản phẩm ".$chitietsanpham->id_sanpham);
  }
 
 public function xoact($id){
    $ctsanpham = CTSanPham::find($id);
    $id_sanpham = $ctsanpham->id_sanpham;
    $ctsanpham->delete();

    return redirect('admin/sanpham/xemct/'.$id_sanpham)->with('thongbao', "Xóa thành công");
 }
    
  
}
