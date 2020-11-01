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
        return view('user::pages.cart.index');
    }
}
