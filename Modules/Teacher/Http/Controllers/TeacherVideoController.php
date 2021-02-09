<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Education\CourseContent;
use App\Models\Education\CourseVideo;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Admin\Http\Requests\AdminCourseContentVideoRequest;

class TeacherVideoController extends TeacherBaseController
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
        return view('teacher::pages.course_video.index', $viewData);
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
        return view('teacher::pages.course_video.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdminCourseContentVideoRequest $request, $id)
    {
        $data = $request->except(['save', '_token','video']);
        $data['created_at'] = Carbon::now();
        if($video = $request->video)
        {
            $fileVideo = $this->processUploadVideo($video);
        }

        if(isset($fileVideo) && $fileVideo) $data['cv_path'] = $fileVideo;

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

        return view('teacher::pages.course_video.update', $viewData);
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
        $data = $request->except(['save', '_token','video']);
        if($video = $request->video)
        {
            $fileVideo = $this->processUploadVideo($video);
        }

        if(isset($fileVideo) && $fileVideo) $data['cv_path'] = $fileVideo;

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

    public function processUploadVideo($fileName)
    {
        try{
            $ext = $fileName->getClientOriginalExtension();

            $extension = [
                'mp4','mov'
            ];

            if(!in_array($ext, $extension)) return false;

            $filename = str_replace($ext,'',$fileName->getClientOriginalName());
            $filename = date('Y-m-d__'). Str::slug($filename).'.'.$ext;
            $path = public_path().'/uploads_video/'. date('Y/m/d');
            if(!\File::exists($path)) mkdir($path,0777, true);

            $fileName->move($path, $filename);

            return  $filename;
        }catch (\Exception $exception)
        {
            Log::error("[processUploadVideo] :". $exception->getMessage());
        }

        return  null;
    }
}
