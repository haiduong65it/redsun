<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function get_Register(){
    	return view('backend.admin.Register');
    }

    public function post_Register(Request $request){
    	$validator = Validator::make($request->all(), [
          'Email' => 'unique:users,email|required|min:5|max:50',
          'Password' => 'required|min:5',
          'Re-Password' => 'required|same:Password',
          'Name' => 'required|min:5',
        ],
        [
          'Email.unique' => "Email đăng nhập này đã tồn tại",
          'Email.required' => "Chưa nhập email đăng nhập",
          'Email.min' => "Email đăng nhập phải có ít nhất 5 kí tự",
          'Email.max' => "Email đăng nhập chứa tối đa 50 kí tự",
          'Password.required' => "Chưa nhập mật khẩu",
          'Password.min' => "Mật khẩu phải có ít nhất 5 kí tự",
          'Name.required' => "Chưa nhập họ tên",
          'Name.min' => "Họ tên phải có ít nhất 5 kí tự",
          'Re-Password.required' => "Chưa nhập lại mật khẩu",
          'Re-Password.same' => "Mật khẩu nhập lại chưa khớp",
        ]); 	
      if ($validator->fails()) 
      {
        return redirect('admin/register')
                    ->withErrors($validator)
                    ->withInput();
      }
    	$avatar = 'default.png';
    	$User = new User;
  		$User->name = $request->Name;
  		$User->email = $request->Email;
  		$User->password = bcrypt($request->Password);
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

      $User->avatar = $avatar;

  		$User->save();
      
      return redirect('admin/login');
    }

    public function get_Login()
    {
      return view('backend.admin.Login');
    }

    public function post_Login(Request $request)
    {
      # code...
      $validator = Validator::make($request->all(), [
        'Email' => "Required",
        'Password' => 'Required|min:5'
      ],
      [
        'Email.required' => 'Chưa nhập Email',
        'Password.required' => 'Chưa nhập mật khẩu',
        'Password.min' => 'Mật khẩu chứa ít nhất 5 kí tự',
      ]);
      if (!Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) 
      {
        $validator->after(function ($validator) {
          $validator->errors()->add('thongbao', 'Email hoặc mật khẩu không đúng');
        });
      }
      if ($validator->fails()) 
        {
          return back()->withErrors($validator)->withInput();
        }
      if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
          return redirect('admin/dashboard');
      } else {
        return back()->withInput()->with('thongbao','Email hoặc mật khẩu không đúng');
      }
    }

    public function get_Edit($id)
    {
      $user = User::find($id);
      return view('backend.admin.Update', ['admin'=>$user]);
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
      Auth::logout();
      return redirect('admin/login');
    }
}
