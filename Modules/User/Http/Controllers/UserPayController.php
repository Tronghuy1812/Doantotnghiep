<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Order;
use App\Models\Cart\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

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

    public function processPayCart(Request $request)
    {
        if ($request->ajax()) {
            $data = [
                't_user_id' => get_data_user('web'),
                't_total_money' => \Cart::subtotal(0, 0, ''),
                't_type_pay' => $request->type ? $request->type : 1,
                'created_at' => Carbon::now()
            ];
            $idTransaction = Transaction::insertGetId($data);
            if ($idTransaction) {
                $listCart = \Cart::content();
                foreach ($listCart as $item) {
                    Order::insert([
                        'o_transaction_id' => $idTransaction,
                        'o_action_id' => $item->id,
                        'o_sale' => 0,
                        'o_price' => $item->price,
                        'o_status' => 1
                    ]);
                }
                \Cart::destroy();
            }

            return response([
                'status' => 200,
            ]);
        }

        return redirect()->to('/');
    }
}
