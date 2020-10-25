<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_status',Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(12);

//        if($request->slug)
//        {
//
//        }

        $viewData = [
            'courses' => $courses
        ];

        return view('pages.category.index', $viewData);
    }
}
