<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserPayController extends UserController
{
    public function getPay(Request $request)
    {
        \SEOMeta::setTitle('Thanh toán');
        $listCarts = \Cart::content();
        $viewData = [
            'listCarts' => $listCarts
        ];
        return view('user::pages.pay.index', $viewData);
    }
}
