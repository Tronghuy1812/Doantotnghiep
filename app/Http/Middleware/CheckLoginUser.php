<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;

class CheckLoginUser
{
    public function handle(Request $request, \Closure $next)
    {
        if(get_data_user('web')) return $next($request);
        if($request->ajax())
        {
            return  response([
                'status' => 401
            ]);
        }
        return redirect()->route('get.home');
    }
}
