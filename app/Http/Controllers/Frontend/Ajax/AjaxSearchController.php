<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class AjaxSearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->q;
        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_name','like','%'.$q.'%')
            ->where('c_status', Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->limit(20)
            ->get();

        return response()->json($courses);
    }
}
