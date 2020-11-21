<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Order;
use App\Models\Cart\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserTransactionController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Danh sách đơn hàng của bạn');
        $transactions = Transaction::where('t_user_id', get_data_user('web'))
            ->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('user::pages.transaction.index', $viewData);
    }

    public function viewTransaction($idTransaction, Request $request)
    {
        \SEOMeta::setTitle('Chi tiết đơn hàng');
        $orders = Order::with('course:id,c_name,c_slug')
            ->where('o_transaction_id', $idTransaction)
            ->get();

        $viewData = [
            'orders'        => $orders,
            'idTransaction' => $idTransaction
        ];
        return view('user::pages.transaction.order', $viewData);
    }
}
