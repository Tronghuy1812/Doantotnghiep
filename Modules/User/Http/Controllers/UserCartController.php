<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserCartController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Giỏ hàng');
        $listCarts = \Cart::content();

        if($listCarts->isEmpty()) return redirect()->to('/');

        return view('user::pages.cart.index',compact('listCarts'));
    }

    /**
     *  Xoá sản phẩm đơn hang
     * */
    public function delete(Request $request, $rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back();
    }
}
