<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhAnh;
use App\CTSanPham;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function home()
    {
        $sanpham = SanPham::all();
        $hinhanh = HinhAnh::all();
        $ctsanpham = CTSanPham::all();
        return view('frontend.dashboard', ['sanpham'=>$sanpham, 'hinhanh'=>$hinhanh,'chitietsanpham'=>$ctsanpham]);
    }
}
