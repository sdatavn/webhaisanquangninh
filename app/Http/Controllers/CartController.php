<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lienhe = \App\lienhe::all();
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        return view('cart',['menu'=>$menu,"lienhe"=>$lienhe]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('/cart')->withSuccessMessage('Sản Phẩm Này Đã Có Trong Giỏ hàng');//sản phẩm đã tồn tại giỏ hàng
            //return back();
        }
        Cart::add($request->id, $request->name, 1/**số lượng 1 sản phẩm*/, $request->price)->associate('App\Product');
        return redirect('/cart')->withSuccessMessage('Thêm Thành Công Sản Phẩm Vào Giỏ Hàng');//thêm thành công vào giỏ hàng
            //return back();
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) /**update giỏ hàng*/
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Số Lượng Sản Phẩm Mỗi Loại Chỉ Từ 1 Đến 10');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('success_message','Thay Đổi Số Lượng Sản Phẩm Trong Giỏ Hàng Thành Công');
        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)/**xóa giỏ hàng*/
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Đã Xóa Sản Phẩm');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()/**giỏ hàng trống*/
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Không Còn Sản Phẩm Nào Trong Giỏ Hàng!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)/**Chuyển Đổi giữa card vs wishlist*/
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Chuyển sản Phẩm qua Wishlist!');

    }
    public function luucsdl(Request $request){
        foreach (Cart::content() as $item){
            $dathang = new \App\donhang();
            $dathang->hoten = $request->hoten;
            $dathang->sdt = $request->sdt;
            $dathang->diachi = $request->diachi;
            $dathang->ghichu = $request->yeucauthem;
            $dathang->name = $item->name;
            $dathang->gia = $item->price;
            $dathang->soluong = $item->qty;
            $dathang->tongtien= $item->subtotal;
            $dathang->save();
        }
        return redirect("trangchu");
    }
}
