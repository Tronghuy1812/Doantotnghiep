<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use Illuminate\Routing\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('t_user_id', get_data_user('web'))
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        $viewData = [
            'transactions' => $transactions
        ];

        return view('user::pages.dashboard.index', $viewData);
    }
}
