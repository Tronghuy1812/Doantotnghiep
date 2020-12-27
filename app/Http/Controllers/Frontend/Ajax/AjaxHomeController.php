<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class AjaxHomeController extends Controller
{
    public function getCourseByCategory(Request $request, $categoryID)
    {
        if($request->ajax())
        {
            $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
                ->withCount('video')
                ->where([
                    'c_category_id' => $categoryID,
                ])
                ->orderByDesc('id')
                ->limit(8)
                ->get();

            $coursesHtml = view('pages.home.include._inc_course_list',['courses' => $courses])->render();

            return response([
                'status' => 200,
                'coursesHtml' => $coursesHtml,
            ]);
        }
    }
}
