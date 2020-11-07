<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserInfoController extends Controller
{
    public function index()
    {
        return view('user::pages.info.index');
    }

    public function edit($id)
    {
        $viewData = [
            'id' => $id
        ];
        return view('user::pages.info.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        User::find($id)->update($data);
        return redirect()->back();
    }
}
