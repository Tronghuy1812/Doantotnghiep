<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(20);
        $viewData = [
            'users' => $users
        ];
        return view('admin::pages.user.index', $viewData);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
