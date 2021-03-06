<?php

namespace App\Http\Controllers;
use App\ThanhVien;
use App\ThuongHieu;
use App\SanPham;
use App\CTSanPham;
use App\HinhAnh;
use App\LoaiSanPham;
use App\Cart;
use App\CTDonHang;
use App\DonHang;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //

    public function get_Register(){
    	return view('frontend.register');
    }

    public function post_Register(Request $request){
    	$validator = Validator::make($request->all(), [
          'InputMail' => 'unique:thanh_viens,email|required',
          'password' => 'required|min:5',
          're-password' => 'required|same:password',
          'InputName' => 'required|min:5',
          'InputSex' => 'required',
          'InputTel' => 'required|digits_between:10,10',
          'InputAdd' => 'required',
          'InputBirth' => 'required|before:today',
        ],
        [
          'InputMail.unique' => "Email này đã tồn tại",
          'InputMail.required' => "Chưa nhập email",
          'password.required' => "Chưa nhập mật khẩu",
          'password.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'InputName.required' => "Chưa nhập họ tên",
          'InputName.min' => "Họ tên phải có ít nhất 5 kí tự",
          're-password.required' => "Chưa nhập lại mật khẩu",
          're-password.same' => "Mật khẩu nhập lại chưa khớp",
          'InputSex.required' => "Chưa chọn giới tính",
          'InputTel.required' => "Chưa nhập số điện thoại",
          'InputTel.digits_between' => "Số điện thoại phải có đủ 10 số",
          'InputAdd.required' => "Chưa nhập địa chỉ",
          'InputBirth.required' => "Chưa chọn ngày sinh",
          'InputBirth.before' => "Ngày sinh phải trước ngày hôm nay",
        ]); 	
      if ($validator->fails()) 
      {
        return back()->withErrors($validator)->withInput();
      }
    	$avatar = 'default.png';
    	$thanhvien = new ThanhVien;
  		$thanhvien->hoten = $request->InputName;
      $thanhvien->password = bcrypt($request->password);
      $thanhvien->gioitinh = $request->InputSex;
      $thanhvien->sdt = $request->InputTel;
      $thanhvien->email = $request->InputMail;
      $thanhvien->diachi = $request->InputAdd;
      $thanhvien->ngaysinh = $request->InputBirth;
  		if ($request->hasfile('Avatar')){
        $file = $request->file('Avatar');
  			$name = $file->getClientOriginalName();
  			$Hinh = str_random(4)."_".$name;
  			while(file_exists("upload/img/avatar/thanhvien/".$Hinh)){
  			  $Hinh = str_random(4)."_".$name;
  			}

  			$file->move('upload/img/avatar/thanhvien', $Hinh);
  			$avatar = $Hinh;
  			}

      $thanhvien->avatar = $avatar;

  		$thanhvien->save();
      
      return redirect('login')->with('thongbao','Đăng kí tài khoản thành công!!!');
    }

    public function get_Login()
    {
      return view('frontend.login');
    }

    public function post_Login(Request $request)
    {
      # code...
      $validator = Validator::make($request->all(), [
        'email' => "Required|email",
        'password' => 'Required|min:5'
      ],
      [
        'email.email' => 'Email không đúng định dạng abc@xxx.com',
        'email.required' => 'Chưa nhập tên đăng nhập',
        'password.required' => 'Chưa nhập mật khẩu',
        'password.min' => 'Mật khẩu chứa ít nhất 5 kí tự',
      ]);
      $arr = [
        'email' => $request->email, 
        'password' => $request->password,
      ];
      if ($validator->fails()) 
        {
          return back()->withErrors($validator)->withInput();
        }
      if (!Auth::guard('thanhvien')->attempt($arr)) 
      {
        $validator->after(function ($validator) {
          $validator->errors()->add('thongbao', 'Tên đăng nhập hoặc mật khẩu không đúng');
        });
      }
      if ($validator->fails()) 
        {
          return back()->withErrors($validator)->withInput();
        }
      if (Auth::guard('thanhvien')->attempt($arr))  {
          return redirect()->route('home');
      }
    }

    public function get_Edit($id)
    {
      $thanhvien = ThanhVien::find($id);
      return view('frontend.edit', ['thanhvien' => $thanhvien]);
    }

    public function post_Edit(Request $request,$id)
    {
      $validator = Validator::make($request->all(), [
          'InputMail' => 'required',
          'password' => 'required|min:5',
          're-password' => 'required|same:password',
          'InputName' => 'required|min:5',
          'InputSex' => 'required',
          'InputTel' => 'required|digits_between:10,10',
          'InputAdd' => 'required',
          'InputBirth' => 'required|before:today',
        ],
        [
          'InputMail.required' => "Chưa nhập email",
          'password.required' => "Chưa nhập mật khẩu",
          'password.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'InputName.required' => "Chưa nhập họ tên",
          'InputName.min' => "Họ tên phải có ít nhất 5 kí tự",
          're-password.required' => "Chưa nhập lại mật khẩu",
          're-password.same' => "Mật khẩu nhập lại chưa khớp",
          'InputSex.required' => "Chưa chọn giới tính",
          'InputTel.required' => "Chưa nhập số điện thoại",
          'InputTel.digits_between' => "Số điện thoại phải có đủ 10 số",
          'InputAdd.required' => "Chưa nhập địa chỉ",
          'InputBirth.required' => "Chưa chọn ngày sinh",
          'InputBirth.before' => "Ngày sinh phải trước ngày hôm nay",
        ]);   
      if ($validator->fails()) 
      {
        return back()->withErrors($validator)->withInput();
      }
      $thanhvien = ThanhVien::find($id);
      $thanhvien->hoten = $request->InputName;
      $thanhvien->email = $request->InputMail;
      $thanhvien->password = bcrypt($request->InputPassword);

      $avatar = $thanhvien->avatar;
      if ($request->hasfile('Avatar')){
        $file = $request->file('Avatar');
  			$name = $file->getClientOriginalName();
  			$Hinh = str_random(4)."_".$name;
  			while(file_exists("upload/img/avatar/admin/".$Hinh)){
  			  $Hinh = str_random(4)."_".$name;
  			}

  			$file->move('upload/img/avatar/admin', $Hinh);
  			$avatar = $Hinh;
  			}

      $thanhvien->avatar = $avatar;
      $thanhvien->ngaysinh = $request->InputBirth;
      $thanhvien->gioitinh = $request->InputSex;
      $thanhvien->sdt = $request->InputTel;
      $thanhvien->diachi = $request->InputAdd;

      $thanhvien->save();

      return redirect('edit/'.$thanhvien->id)->with('thongbao', "Sửa thành công");
      
    }

    public function Logout()
    {
      Auth::guard('thanhvien')->logout();
      return redirect()->route('home');
    }

    public function AddToCart(Request $request,$id){
      $sanpham = SanPham::find($id);
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $ctsanpham = CTSanPham::find($request->size_color);
      $cart->add($sanpham, $id, $ctsanpham, $request->qty);
      $request->session()->put('cart',$cart);
      return redirect()->back();
    }
    public function getDelItemCart($id){
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);
      if (count($cart->items)>0){
        Session::put('cart',$cart);
      }
      else {
        Session::forget('cart');
      }
      return redirect()->back();
    }


    public function getCTSanPham($id){
      $thuonghieu = ThuongHieu::all();
      $sanpham = SanPham::find($id);
      $ctsanpham = CTSanPham::where('id_sanpham', $sanpham->id)->get();
      $hinhanh = HinhAnh::all();
      $loaisanpham = LoaiSanPham::all();
      return view('frontend.detail_product',['thuonghieu'=>$thuonghieu,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'chitietsanpham'=>$ctsanpham, 'loaisanpham'=>$loaisanpham]);
    }

    public function get_giohang(){
      return view('frontend.cart');
    }

    public function get_checkout(){
      return view('frontend.checkout');
    }

    public function post_checkout(Request $request){
      $cart = Session::get('cart');
      foreach ($cart->items as $key => $value) {
        $ctsanpham = CTSanPham::find($value['detail']['id']);
        if ($ctsanpham->soluong < $value['qty']){
          return redirect()->back()->with('thongbao','Số lượng mặt hàng đã chọn cửa hàng hiện tại không đủ để cung cấp. Mong bạn thông cảm cho sự bất tiện này!!!');
        }
      }
      if ($request->payment == 'payment-2')
        $payment = 'Thanh Toán qua thẻ ngân hàng';
      else
        $payment = 'Thanh toán khi nhận hàng';
      $donhang = new DonHang;
      $donhang->phuongthucthanhtoan = $payment;
      $donhang->ngaydat = date('Y-m-d');
      $donhang->id_thanhvien = Auth::guard('thanhvien')->user()->id;
      $donhang->hoten = $request->ten_nguoi_mua;
      $donhang->diachi = $request->dia_chi;
      $donhang->sdt = $request->dien_thoai;
      $donhang->tongtien = $cart->totalPrice;
      $donhang->trangthaidonhang = 0;
      $donhang->save();

      foreach ($cart->items as $key => $value) {
        $ctdonhang = new CTDonHang;
        $ctdonhang->id_donhang = $donhang->id;
        $ctdonhang->id_sanpham = $key;
        $ctdonhang->soluong = $value['qty'];
        $ctdonhang->dongia = ($value['price']/$value['qty']);
        $ctdonhang->size = $value['detail']['size'];
        $ctdonhang->mau = $value['detail']['mau'];
        $ctdonhang->save();

        $ctsanpham = CTSanPham::find($value['detail']['id']);
        $ctsanpham->soluong -= $value['qty'];
        $ctsanpham->save();
      }

      Session::forget('cart');
      return back()->with('thongbao','Đặt hàng thành công');
    }

    public function get_sanpham(){
      $thuonghieu = ThuongHieu::all();
      $sanpham = SanPham::all();
      $ctsanpham = CTSanPham::all();
      $hinhanh = HinhAnh::all();
      $loaisanpham = LoaiSanPham::all();
      return view('frontend.product',['thuonghieu'=>$thuonghieu,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'chitietsanpham'=>$ctsanpham,'loaisanpham'=>$loaisanpham]);
    }

    public function get_introduce(){
      return view('frontend.introduce');
    }
    public function  get_guide(){
      return view('frontend.guide');
    }
}
