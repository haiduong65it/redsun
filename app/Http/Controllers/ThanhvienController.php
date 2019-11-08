<?php

namespace App\Http\Controllers;
use App\ThanhVien;
use Illuminate\Http\Request;

class ThanhvienController extends Controller
{
    //
    public function danhsach(){
    	$thanhvien = ThanhVien::all();
    	return view('backend.admin.thanhvien.List', ['thanhvien'=>$thanhvien]);
    }

    public function get_them(){
    	return view('backend.admin.thanhvien.Create');
    }

    public function post_them(Request $request){
    	$this->validate($request,
        [
          'InputID' => 'unique:ThanhVien,tendangnhap|required|min:5|max:50',
          'InputPassword' => 'required|min:5',
          'InputName' => 'required|min:5',
          'InputTel' => 'required|digits_between:10,10',
          'InputBirth' => 'required|before:today',
          'InputAddress' => 'required',
          'InputAvatar' => 'required',
        ],
        [
          'InputID.unique' => "tên đăng nhập này đã tồn tại",
          'InputID.required' => "Chưa nhập tên đăng nhập",
          'InputID.min' => "tên đăng nhập phải có ít nhất 5 kí tự",
          'InputID.max' => "tên đăng nhập chứa tối đa 50 kí tự",
          'InputPassword.required' => "Chưa nhập mật khẩu",
          'InputPassword.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'InputName.required' => "Chưa nhập tên nhân viên",
          'InputName.min' => "Tên nhân viên phải có ít nhất 5 kí tự",
          'InputTel.required' => "Chưa nhập số điện thoại",
          'InputTel.digits_between' => "Số điện thoại phải có đủ 10 số",
          'InputBirth.required' => "Chưa chọn ngày sinh",
          'InputBirth.before' => "Ngày sinh phải trước ngày hôm nay",
        ]); 	

    	$avatar = 'default.png';
    	$thanhvien = new ThanhVien;
  		$thanhvien->hoten = $request->InputName;
  		$thanhvien->ngaysinh = $request->InputBirth;
  		$thanhvien->gioitinh = $request->InputSex;
  		$thanhvien->sdt = $request->InputTel;
  		$thanhvien->diachi = $request->InputAddress;
  		$thanhvien->tendangnhap = $request->InputID;
  		$thanhvien->matkhau = bcrypt($request->InputPassword);
  		if ($request->hasfile('InputAvatar')){
        $file = $request->file('InputAvatar');
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

      return redirect('admin/thanhvien/them')->with('thongbao','Thêm nhân viên thành công');
    }

    public function get_sua($id)
    {
      $thanhvien = ThanhVien::find($id);
      return view('backend.admin.thanhvien.Update', ['thanhvien'=>$thanhvien]);
    }

    public function post_sua(Request $request,$id)
    {
      $thanhvien = ThanhVien::find($id);
      if($request->changeID == "on"){
        $this->validate($request,
        [
          'InputID' => 'unique:ThanhVien,tendangnhap|required|min:5|max:50',
        ],
        [
          'InputID.unique' => "tên đăng nhập này đã tồn tại",
          'InputID.required' => "Chưa nhập tên đăng nhập",
          'InputID.min' => "tên đăng nhập phải có ít nhất 5 kí tự",
          'InputID.max' => "tên đăng nhập chứa tối đa 50 kí tự",
        ]);
        $thanhvien->tendangnhap = $request->InputID;
      }
      if($request->changePass == "on"){
        $this->validate($request,
        [
          'InputPassword' => 'required|min:5',
          'PasswordAgain' => 'required|same:InputPassword'
        ],
        [
          'InputPassword.required' => "Chưa nhập mật khẩu",
          'InputPassword.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'PasswordAgain.required' => "Chưa nhập lại mật khẩu",
          'PasswordAgain.same' => "Mật khẩu nhập lại chưa khớp",
        ]);
        $thanhvien->password = bcrypt($request->InputPassword);
      }

      $thanhvien->save();

      return redirect('admin/thanhvien/danhsach')->with('thongbao',"Sửa thành công nhân viên ".$thanhvien->hoten);
      
    }

    public function xoa($id)
    {
      $thanhvien = ThanhVien::find($id);
      $hoten = $thanhvien->hoten;
      $thanhvien->delete();

      return redirect('admin/thanhvien/danhsach')->with('thongbao',"Đã xóa thành công nhân viên ".$hoten);
    }
}
