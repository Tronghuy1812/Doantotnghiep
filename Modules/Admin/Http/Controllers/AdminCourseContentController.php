<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\CourseContent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCourseContentController extends Controller
{
    public function store(Request $request, $id)
    {
        if($request->ajax())
        {
            $courseContent = new CourseContent();
            $courseContent->cc_name = $request->name;
            $courseContent->cc_total_video = $request->video;
            $courseContent->cc_total_question = $request->question;
            $courseContent->cc_content = $request->name;
            $courseContent->cc_course_id = $id;
            $courseContent->save();

            return response()->json([
                'status' => 200
            ]);
        }
    }
}
