<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\CourseTag;
use App\Models\Education\SeoEdutcation;
use App\Models\Education\Tag;
use App\Models\Education\Teacher;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminCourseRequest;

class AdminCourseController extends AdminController
{
    public function index()
    {
        $courses = Course::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'courses' => $courses
        ];
        return view('admin::pages.course.index', $viewData);
    }

    public function create()
    {
        $categories = Category::orderByDesc('c_sort')
            ->get();
        $teachers = Teacher::orderByDesc('id')->get();
        $tags = Tag::all();

        $viewData = [
            'categories' => $categories,
            'teachers' => $teachers,
            'tags' => $tags,
            'tagOld' => []
        ];

        return view('admin::pages.course.create', $viewData);
    }

    public function store(AdminCourseRequest $request)
    {
        $data = $request->except(['avatar', 'save', '_token','tags']);
        $data['c_position_1'] = 0;
        $data['created_at'] = Carbon::now();

        if (!$request->c_title_seo) $data['c_title_seo'] = $request->c_name;
        if (!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if (!$request->c_sale) $data['c_sale'] = 0;
        if (!$request->c_total_time) $data['c_total_time'] = 0;
        if (!$request->c_price) $data['c_price'] = 0;
        if($request->c_position_1) $data['c_position_1'] = 1;

        $courseID = Course::insertGetId($data);
        if ($courseID) {
            $this->showMessagesSuccess();
            $this->syncTagCourse($courseID, $request->tags);
            RenderUrlSeoCourseService::init($request->c_slug, SeoEdutcation::TYPE_COURSE, $courseID);
            return redirect()->route('get_admin.course.index');
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    protected function syncTagCourse($courseID, $tags)
    {
        if (!empty($tags))
        {
            \DB::table('courses_tags')->where('ct_course_id', $courseID)->delete();
            foreach ($tags as $item)
            {
                CourseTag::insert([
                    'ct_course_id' => $courseID,
                    'ct_tag_id' => $item
                ]);
            }
        }
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::orderByDesc('c_sort')
            ->get();
        $teachers = Teacher::orderByDesc('id')->get();
        $tags = Tag::all();

        $tagOld = CourseTag::where('ct_course_id', $id)
            ->pluck('ct_tag_id')
            ->toArray() ?? [];

        $viewData = [
            'course' => $course,
            'categories' => $categories,
            'teachers' => $teachers,
            'tags' => $tags,
            'tagOld' => $tagOld
        ];
        return view('admin::pages.course.update', $viewData);
    }

    public function update(AdminCourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->except(['avatar', 'save', '_token','c_position_1']);
        $data['updated_at'] = Carbon::now();

        if (!$request->c_title_seo) $data['c_title_seo'] = $request->c_name;
        if (!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if (!$request->c_sale) $data['c_sale'] = 0;
        if (!$request->c_total_time) $data['c_total_time'] = 0;
        if (!$request->c_price) $data['c_price'] = 0;
        if($request->c_position_1) $data['c_position_1'] = 1;

        $course->fill($data)->save();
        $this->syncTagCourse($id, $request->tags);

        RenderUrlSeoCourseService::init($request->c_slug, SeoEdutcation::TYPE_COURSE, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.course.index');
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $course = Course::findOrFail($id);
            if ($course) {
                $course->delete();
                RenderUrlSeoCourseService::deleteUrlSeo(SeoEdutcation::TYPE_COURSE, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
