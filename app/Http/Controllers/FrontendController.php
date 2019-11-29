<?php

namespace App\Http\Controllers;
use App\ThanhVien;
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
      $user = User::find($id);
      $validator_name = Validator::make($request->all(), [
        'Name' => 'required|min:5',
        ],
        [
          'Name.required' => "Chưa nhập họ tên",
          'Name.min' => "Họ tên phải có ít nhất 5 kí tự",
        ]);
        if ($validator_name->fails()) 
        {
          return back()->withErrors($validator_name)->withInput();
        }
      $user->name = $request->Name;
      if($request->changeEmail == "on"){
        $validator_email = Validator::make($request->all(), [
          'Email' => 'unique:users,email|required|min:5|max:50',
        ],
        [
          'Email.unique' => "tên đăng nhập này đã tồn tại",
          'Email.required' => "Chưa nhập tên đăng nhập",
          'Email.min' => "tên đăng nhập phải có ít nhất 5 kí tự",
          'Email.max' => "tên đăng nhập chứa tối đa 50 kí tự",
        ]);
        if ($validator_email->fails()) 
        {
          return back()->withErrors($validator_email)->withInput();
        }
        $user->email = $request->Email;
      }
      if($request->changePass == "on"){
        $validator_pass = Validator::make($request->all(), [
          'Password' => 'required|min:5',
          'Re-Password' => 'required|same:Password'
        ],
        [
          'Password.required' => "Chưa nhập mật khẩu",
          'Password.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'Re-Password.required' => "Chưa nhập lại mật khẩu",
          'Re-Password.same' => "Mật khẩu nhập lại chưa khớp",
        ]);
        if ($validator_pass->fails()) 
        {
          return back()->withErrors($validator_pass)->withInput();
        }
        $user->password = bcrypt($request->InputPassword);
      }
      $avatar = $user->avatar;
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

      $user->avatar = $avatar;

      $user->save();

      return redirect('admin/dashboard');
      
    }

    public function Logout()
    {
      Auth::guard('thanhvien')->logout();
      return redirect()->route('home');
    }
}