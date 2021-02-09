<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 2/9/21 .
 * Time: 10:33 AM .
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class CheckLoginTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if(get_data_user('teachers')) return $next($request);

        return redirect()->route('get_teacher.login');
    }
}
