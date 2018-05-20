<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Cart;
class PageController extends Controller
{
    public function getIndex()
    {
        // lấy tất cả slide
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai-san-pham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChiTiet(Request $req)
    {
        $sanpham=Product::where('id',$req->id)->first();
        // tim sản phẩm tương tự
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienHe()
    {
        return view('page.contact');
    }
    public function getGioiThieu()
    {
        return view('page.gioithieu');
    }
    public function getAddToCart(Request $req,$id)
    {
        $product = Product::find($id);      
        $oldCart = Session('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product , $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function getSignUp()
    {
        return view('page.signup');
    }
    public function postSignUp(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.requied'=>'vui lòng nhập Email',
                'email.email'=>'Không Đúng Định Dạng Email',
                'email.unique'=>'Email Đã được sử dụng vui lòng chọn email khác',
                'password.require'=>'Vui Lòng Nhập Mật Khẩu',
                'repassword.same'=>'Mật Khẩu Không Giống Nhau'
            ]
        );
        $user = new User();
        $user->fullname=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo Tài Khoản Thành Công');
    }
    public function postLogin(Request $req)
    {
        $this->validate($req,
    [
        'email'=>'required|email',
        'password'=>'required|min:6|max:20'
    ],
    [
        'email.required'=>'Vui Long Nhap Email',
        'email.email'=>'Vui Long Nhap Dung DInh Dang',
        'password.required'=>'Vui Long Nhap Dung pw',
        'password.min'=>'vui long nhap lai',
        'password.max'=>'vui long nhap lai'
    ]);
        // tạo biến chứng thực 
        $credientials = array('email'=>$req->email ,'password'=>$req->password);
        if(Auth::attempt($credientials))
        {
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng Nhập Thành Công ']);
        }else{
            return redirect()->back()->with('message','Đăng Nhập Thất Bại');
        }
    }  
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search',compact('product'));
    }
}
