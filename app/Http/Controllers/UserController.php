<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function get_them(){
    	return view('backend.admin.admin.Create');
    }

    public function post_them(Request $request){
    	$this->validate($request,
        [
          'InputID' => 'unique:NhanVien,tendangnhap|required|min:5|max:50',
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
    	$nhanvien = new NhanVien;
  		$nhanvien->hoten = $request->InputName;
  		$nhanvien->ngaysinh = $request->InputBirth;
  		$nhanvien->gioitinh = $request->InputSex;
  		$nhanvien->sdt = $request->InputTel;
  		$nhanvien->diachi = $request->InputAddress;
  		$nhanvien->tendangnhap = $request->InputID;
  		$nhanvien->matkhau = bcrypt($request->InputPassword);
  		if ($request->hasfile('InputAvatar')){
        $file = $request->file('InputAvatar');
  			$name = $file->getClientOriginalName();
  			$Hinh = str_random(4)."_".$name;
  			while(file_exists("upload/img/avatar/nhanvien/".$Hinh)){
  			  $Hinh = str_random(4)."_".$name;
  			}

  			$file->move('upload/img/avatar/nhanvien', $Hinh);
  			$avatar = $Hinh;
  			}

      $nhanvien->avatar = $avatar;

  		$nhanvien->save();

      return redirect('admin/nhanvien/them')->with('thongbao','Thêm nhân viên thành công');
    }

    public function get_sua($id)
    {
      $nhanvien = NhanVien::find($id);
      return view('backend.admin.nhanvien.Update', ['nhanvien'=>$nhanvien]);
    }

    public function post_sua(Request $request,$id)
    {
      $nhanvien = NhanVien::find($id);
      if($request->changeID == "on"){
        $this->validate($request,
        [
          'InputID' => 'unique:NhanVien,tendangnhap|required|min:5|max:50',
        ],
        [
          'InputID.unique' => "tên đăng nhập này đã tồn tại",
          'InputID.required' => "Chưa nhập tên đăng nhập",
          'InputID.min' => "tên đăng nhập phải có ít nhất 5 kí tự",
          'InputID.max' => "tên đăng nhập chứa tối đa 50 kí tự",
        ]);
        $nhanvien->tendangnhap = $request->InputID;
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
        $nhanvien->password = bcrypt($request->InputPassword);
      }

      $nhanvien->save();

      return redirect('admin/nhanvien/danhsach')->with('thongbao',"Sửa thành công nhân viên ".$nhanvien->hoten);
      
    }

    public function xoa($id)
    {
      $nhanvien = NhanVien::find($id);
      $hoten = $nhanvien->hoten;
      $nhanvien->delete();

      return redirect('admin/nhanvien/danhsach')->with('thongbao',"Đã xóa thành công nhân viên ".$hoten);
    }
}
