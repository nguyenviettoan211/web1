<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Cart;
use App\CategoryProduct;
use App\Customer;
use App\Product;
use App\Slide;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    //
    function __construct()
    {
//		$allSlide = Slide::all();
//		view()->share('allSlide',$allSlide);
//		$allCategory = CategoryProduct::all();
//		view()->share('allCategory',$allCategory);
    }

    //get Index Page
    function getIndex()
    {

        $newProducts = Product::where('new', 1)->paginate(8);
        $promotionProducts = Product::where('sale', 1)->paginate(8);
        return view('page.index', compact('newProducts', 'promotionProducts'));
    }

    //get Category Page
    function getCategory($id)
    {
        $categoryDetail = CategoryProduct::find($id);
        $productCategoryDetail = Product::where('id_type', $id)->paginate(6);
        return view('page.category', compact('categoryDetail', 'productCategoryDetail'));
    }

    //get Product Detail
    function getProduct($id)
    {
        $productDetail = Product::find($id);

        $productsRelate = Product::where([
            ['id_type', $productDetail->id_type],
            ['id', '<>', $id],
        ])->take(3)->get();
//		['id_category','<>',$productDetail->categoryProduct->id_category]
        return view('page.product', compact('productDetail', 'productsRelate'));
    }

    //get Contact
    function getContact()
    {
        return view('page.contact');
    }

    //get About
    function getAbout()
    {
        return view('page.about');
    }

    function getAddToCart(Request $request, $id)
    {
        $productAddCart = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($productAddCart, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    function getDeleteProduct($id)
    {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items > 0)) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    function getCheckout()
    {
        return view('page.checkout');
    }

    function postCheckout(Request $request)
    {
        $cart = Session::get('cart');
//		dd($cart);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $customer->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
//			dd($key);
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['quantity'];
            $bill_detail->unit_price = $value['price'] / $value['quantity'];
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->route('index')->with('announcement', 'Your order successfully');

    }

    function getLogin()
    {
        return view('page.login');
    }

    function getSignUp()
    {
        return view('page.sign-up');
    }

    function postSignUp(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                'repassword' => 'required|same:password'
            ],
            [
                'email.required' => 'vui long nhap email',
                'email.email' => 'Ko dung dinh dang email',
                'email.unique' => 'Email da dc su dung',
                'password.required' => 'Vui long nhap mk',
                'repassword.same' => 'Ko giong mat khau',
                'password.min' => 'Mat khau it nhat 6 ki tu'
            ]);
        $users=new User();
        $users->full_name = $request->fullname;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->back()->with('thanhcong', 'tao tk thanh cong');


        return redirect()->route('index')->with('announcement', 'Register succcessfully');
    }

    function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [

            ]);
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index')->with(['flag' => 'success', 'announcement' => 'Login Successfully']);
        } else {
            return redirect()->route('index')->with(['flag' => 'danger', 'announcement' => 'Login Failed']);
        }

    }

    function logout()
    {
        \Auth::logout();
        return redirect()->route('index')->with(['flag' => 'success', 'announcement' => 'Logout Successfully']);
    }

    function search(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')
            ->orWhere('unit_price', $request->key)
            ->get();
        return view('page.search', compact('product'));
    }
}
