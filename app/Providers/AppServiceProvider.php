<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use App\Slide;
use App\CategoryProduct;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Schema::defaultStringLength(191);
        \View::composer(['header','page.category'],function($view){
            $allCategory = CategoryProduct::all();
            $view->with('allCategory',$allCategory);
        });
        \View::composer('page.index',function($view){
            $allSlide = Slide::all();
            $view->with('allSlide',$allSlide);
        });
        \View::composer(['header','page.checkout'],function($view){
            if(\Session('cart')){
                $oldCart = \Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>\Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQuantity'=>$cart->totalQuantity]);
            }

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
