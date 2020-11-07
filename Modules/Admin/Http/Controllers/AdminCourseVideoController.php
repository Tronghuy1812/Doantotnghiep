<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\CourseContent;
use App\Models\Education\CourseVideo;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminCourseContentVideoRequest;

class AdminCourseVideoController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        $contentsVideos = CourseVideo::where('cv_course_id', $id)
            ->orderBy('cv_sort', 'asc')
            ->paginate(20);

        $viewData = [
            'id' => $id,
            'contentsVideos' => $contentsVideos
        ];
        return view('admin::pages.course_video.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $courseContent = CourseContent::where('cc_course_id', $id)
            ->orderBy('cc_sort', 'asc')
            ->get();

        $viewData = [
            'id' => $id,
            'courseContent' => $courseContent
        ];
        return view('admin::pages.course_video.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminCourseContentVideoRequest $request, $id)
    {
        $data = $request->except(['save', '_token']);
        $data['created_at'] = Carbon::now();
        $idVideo = CourseVideo::insertGetId($data);
        if ($idVideo) {
            $this->showMessagesSuccess();
            return redirect()->back();
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $videoID)
    {
        $courseVideo = CourseVideo::find($videoID);
        $courseContent = CourseContent::where('cc_course_id', $id)
            ->orderBy('cc_sort', 'asc')
            ->get();

        $viewData = [
            'id' => $id,
            'courseContent' => $courseContent,
            'courseVideo' => $courseVideo
        ];

        return view('admin::pages.course_video.update', $viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AdminCourseContentVideoRequest $request, $id, $videoID)
    {
        $courseVideo = CourseVideo::findOrFail($videoID);
        $data = $request->except(['save', '_token']);
        $data['updated_at'] = Carbon::now();
        $courseVideo->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->back();
    }

    public function delete(Request $request, $id, $content)
    {
        if ($request->ajax()) {
            $course = CourseVideo::find($content);
            if ($course) $course->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
        return redirect()->to('/');
    }
}
