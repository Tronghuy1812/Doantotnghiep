<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{
    public function callback(Request $request)
    {
        if ($request->ajax()) {
            $data        = $request->data;
            $provider_id = $data['id'] ?? null;
            if (!$provider_id) {
                return response()->json([
                    'code'     => 401,
                    'messages' => 'Không tồn tại dữ liệu'
                ]);
            }
            $user = User::where('provider_id', $data['id'])->first();
            if (!$user) {
                $user = User::where('email', $data['email'])->first();
                if (!$user)
                {
                    $user  = new User();
                    $user->provider_id = $provider_id;
                    $user->provider = 'google';
                    $user->email = $data['email'];
                    $user->name = $data['name'];
                    $user->password = $data['email'];
                    $user->avatar_social = $data['avatar'];
                    $user->created_at = Carbon::now();
                }else{
                    $user->provider_id = $provider_id;
                    $user->provider = 'google';
                }
                $user->save();
            }

            if (\Auth::loginUsingId($user->id, true)) {
                return response()->json([
                    'code'     => 200,
                ]);
            }
            return response()->json([
                'code'     => 404,
                'messages' => 'Đăng nhập thất bại'
            ]);
        }
    }
}
