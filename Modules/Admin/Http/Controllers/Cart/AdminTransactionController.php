<?php

namespace Modules\Admin\Http\Controllers\Cart;

use App\Models\Cart\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user:id,name,email')->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::pages.transaction.index', $viewData);
    }
}
