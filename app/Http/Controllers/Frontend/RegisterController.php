<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        if ($request->ajax())
        {
            $code =  200;
            try{
                $data               = $request->except('_token');
                $data['created_at'] = Carbon::now();
                $data['password'] = bcrypt($request->password);
                $id = User::insertGetId($data);
                if($id){
                    if (\Auth::attempt([
                        'email' => $request->email,
                        'password' => $request->password
                    ])) {
                        // xử lý tiếp
                    }
                }
            }catch (\Exception $exception)
            {
                $code = 501;
                Log::error("[Register]: ". $exception->getMessage());
            }
            return response()->json([
                'code'     => $code,
            ]);
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('get.home');
    }
}
