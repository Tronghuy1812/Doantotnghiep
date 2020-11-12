<?php

namespace Modules\Admin\Http\Controllers\Cart;

use App\Models\Cart\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminController;

class AdminTransactionController extends AdminController
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

    public function edit($id, Request $request)
    {
        $transaction = Transaction::findOrFail($id);
        $status = Transaction::getStatusGlobal();
        $viewData = [
            'transaction' => $transaction,
            'status' => $status
        ];
        return view('admin::pages.transaction.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->t_status = $request->t_status;
        $transaction->save();
        \DB::table('orders')->where('o_transaction_id', $id)
            ->update([
                'o_status' => $request->t_status
            ]);
        $this->showMessagesSuccess('Cập nhật thành công');
        return redirect()->back();
    }
}
