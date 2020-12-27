<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(LoginRequest  $request)
    {
        if($request->ajax())
        {
            $credentials = $request->only('email', 'password');
            Log::info($credentials);
            if (\Auth::attempt($credentials)) {
                if($request->ajax())
                {
                    return response()->json([
                        'code'     => 200,
                    ]);
                }
                return redirect()->route('get.home');
            }
        }


        return redirect()->route('get.home');
    }
}
