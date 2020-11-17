<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Education\Tag;
use App\Models\Education\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function getCourseByTeacherSlug(Request $request, $slug)
    {
        $teacher = Teacher::where('t_slug', $slug)
            ->first();
        if (!$teacher) return abort(404);

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_status', Course::STATUS_DEFAULT)
            ->where('c_teacher_id', $teacher->id)
            ->orderByDesc('id')
            ->paginate(12);

        $tags = Tag::whereHas('teacher', function ($query) use ($teacher) {
            $query->where('tt_teacher_id', $teacher->id);
        })->get();


        \SEOMeta::setTitle($teacher->t_name);
        \SEOMeta::setDescription($teacher->t_name);

        $viewData = [
            'courses' => $courses,
            'teacher' => $teacher,
            'tags' => $tags
        ];

        return view('pages.teacher.course', $viewData);
    }
}
