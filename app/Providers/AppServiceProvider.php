<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\ThanhVien;
use App\ThuongHieu;
use App\SanPham;
use App\CTSanPham;
use App\HinhAnh;
use App\LoaiSanPham;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        // view()->composer('layouts.frontend.header',function($view){
        //     $thuonghieu = thuonghieu::all();
        //     $sanpham = sanpham::all();
        //     $hinhanh = hinhanh::all();

        //     $view->with(['thuonghieu'=>$thuonghieu,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh]);
        // });

        view()->composer('layouts.frontend.header',function($view){
            if (Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty' =>$cart->totalQty]);
            }   
        });

        view()->composer('frontend.cart',function($view){
            if (Session('cart')){
                $cart = Session::get('cart');
                $hinhanh = hinhanh::all();
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty' =>$cart->totalQty, 'hinhanh' =>$hinhanh]);
            }   
        });

        view()->composer('frontend.checkout',function($view){
            if (Session('cart')){
                $cart = Session::get('cart');
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty' =>$cart->totalQty]);
            }   
        });
    }
}
