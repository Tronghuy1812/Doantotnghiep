<?php

namespace Modules\Teacher\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminLoginRequest;
use Modules\Teacher\Http\Requests\TeacherLoginRequest;

class TeacherLoginController extends Controller
{
    public function login()
    {
        return view('teacher::pages.auth.login');
    }

    public function postLogin(TeacherLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::guard('teachers')->attempt($credentials)) {
            return redirect()->route('get_teacher.dashboard');
        }

        return  redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('get_teacher.login');
    }
}
