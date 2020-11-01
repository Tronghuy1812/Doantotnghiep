<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Education\CourseContent;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourseDetail($id, $request)
    {
        $courseDetail = Course::where([
            'id' => $id,
            'c_status' => Course::STATUS_DEFAULT
        ])->first();

        if (!$courseDetail) return abort(404);

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_status', Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(3);

        $courseContent = CourseContent::where('cc_course_id', $id)
            ->orderBy('cc_sort','asc')
            ->get();

        \SEOMeta::setTitle($courseDetail->c_name);

        $viewData = [
            'courses' => $courses,
            'courseContent' => $courseContent,
            'courseDetail' => $courseDetail
        ];

        return view('pages.course.index', $viewData);
    }
}
