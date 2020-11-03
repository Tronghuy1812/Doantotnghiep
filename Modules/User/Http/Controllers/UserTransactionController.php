<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('t_user_id', get_data_user('web'))
            ->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('user::pages.transaction.index', $viewData);
    }
}
