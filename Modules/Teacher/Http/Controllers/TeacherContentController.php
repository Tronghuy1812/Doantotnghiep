<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Education\Course;
use App\Models\Education\CourseContent;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminCourseContentRequest;

class TeacherContentController extends TeacherBaseController
{
    public function index($id)
    {
        $course             = Course::where([
            'c_teacher_id' => get_data_user('teachers'),
            'id' => $id
        ])->first();

        $courseContent = CourseContent::where('cc_course_id', $id)
            ->orderBy('cc_sort', 'asc')
            ->get();
        $viewData = [
            'course' => $course,
            'id' => $id,
            'courseContent' => $courseContent
        ];

        return view('teacher::pages.course_content.index', $viewData);
    }

    public function create($id)
    {
        $viewData = [
            'id' => $id
        ];
        return view('teacher::pages.course_content.create', $viewData);
    }

    public function store(AdminCourseContentRequest $request, $id)
    {
        $data = $request->except(['save', '_token','avatar']);
        $data['created_at'] = Carbon::now();
        $idContent = CourseContent::insertGetId($data);
        if($idContent) {
            $this->showMessagesSuccess();
            return redirect()->back();
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    public function edit($id, $contentId)
    {
        $courseContent = CourseContent::find($contentId);
        $viewData = [
            'id' => $id,
            'courseContent' => $courseContent
        ];
        return view('teacher::pages.course_content.update', $viewData);
    }

    public function update(AdminCourseContentRequest $request, $id, $contentId)
    {
        $course = CourseContent::findOrFail($contentId);
        $data = $request->except(['save', '_token','avatar']);
        $data['updated_at'] = Carbon::now();
        $course->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->back();
    }

    public function delete(Request $request, $id, $content)
    {
        if ($request->ajax()) {
            $course = CourseContent::find($content);
            if ($course) $course->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
        return redirect()->to('/');
    }
}
