<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\CourseContent;
use App\Models\Education\CourseTag;
use App\Models\Education\SeoEdutcation;
use App\Models\Education\Tag;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Teacher\Http\Requests\TeacherCourseRequest;

class TeacherCourseController extends TeacherBaseController
{
    public function index(Request $request)
    {
        $courses = Course::where('c_teacher_id', get_data_user('teachers'));
        if($name = $request->n)
            $courses->where('c_name','like','%'.$name.'%');

        $courses =  $courses->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'courses' => $courses,
            'query' => $request->query()
        ];

        return view('teacher::pages.course.index', $viewData);
    }

    public function create()
    {
        $categories = Category::orderByDesc('c_sort')
            ->get();
        $tags       = Tag::all();
        $level      = (new Course())->level;

        $viewData = [
            'categories' => $categories,
            'tags'       => $tags,
            'level'      => $level,
            'tagOld'     => []
        ];

        return view('teacher::pages.course.create', $viewData);
    }

    public function store(TeacherCourseRequest $request)
    {
        $data                 = $request->except(['avatar', 'save', '_token', 'tags']);
        $data['c_position_1'] = 0;
        $data['c_price']      = str_replace(',', '', $request->c_price);
        $data['created_at']   = Carbon::now();

        if (!$request->c_title_seo) $data['c_title_seo'] = $request->c_name;
        if (!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if (!$request->c_sale) $data['c_sale'] = 0;
        if (!$request->c_total_time) $data['c_total_time'] = 0;
        if (!$request->c_price) $data['c_price'] = 0;
        if ($request->c_position_1) $data['c_position_1'] = 1;

        $data['c_teacher_id'] = get_data_user('teachers');

        $courseID = Course::insertGetId($data);
        if ($courseID) {
            $this->showMessagesSuccess();
            $this->syncTagCourse($courseID, $request->tags);
            RenderUrlSeoCourseService::init($request->c_slug, SeoEdutcation::TYPE_COURSE, $courseID);
            return redirect()->route('get_teacher.course.index');
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    protected function syncTagCourse($courseID, $tags)
    {
        if (!empty($tags)) {
            \DB::table('courses_tags')->where('ct_course_id', $courseID)->delete();
            foreach ($tags as $item) {
                CourseTag::insert([
                    'ct_course_id' => $courseID,
                    'ct_tag_id'    => $item
                ]);
            }
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $course             = Course::where([
            'c_teacher_id' => get_data_user('teachers'),
            'id' => $id
        ])->first();
        $categories = Category::orderByDesc('c_sort')
            ->get();
        $tags       = Tag::all();
        $level      = (new Course())->level;

        $tagOld = CourseTag::where('ct_course_id', $id)
                ->pluck('ct_tag_id')
                ->toArray() ?? [];

        $courseContent = CourseContent::where('cc_course_id', $id)
            ->orderBy('cc_sort', 'asc')
            ->get();


        $viewData = [
            'course'        => $course,
            'categories'    => $categories,
            'tags'          => $tags,
            'level'         => $level,
            'courseContent' => $courseContent,
            'tagOld'        => $tagOld
        ];
        return view('teacher::pages.course.update', $viewData);
    }

    public function update(TeacherCourseRequest $request, $id)
    {
        $course             = Course::where([
            'c_teacher_id' => get_data_user('teachers'),
            'id' => $id
        ])->first();


        $data               = $request->except(['avatar', 'save', '_token', 'c_position_1']);
        $data['updated_at'] = Carbon::now();

        if (!$request->c_title_seo) $data['c_title_seo'] = $request->c_name;
        if (!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if (!$request->c_sale) $data['c_sale'] = 0;
        if (!$request->c_total_time) $data['c_total_time'] = 0;
        if (!$request->c_price) $data['c_price'] = 0;
        if ($request->c_position_1) $data['c_position_1'] = 1;
        $data['c_price'] = str_replace(',', '', $request->c_price);

        $course->fill($data)->save();
        $this->syncTagCourse($id, $request->tags);

        RenderUrlSeoCourseService::init($request->c_slug, SeoEdutcation::TYPE_COURSE, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_teacher.course.index');
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {

            $course             = Course::where([
                'c_teacher_id' => get_data_user('teachers'),
                'id' => $id
            ])->first();
            if ($course) {
                $course->delete();
                RenderUrlSeoCourseService::deleteUrlSeo(SeoEdutcation::TYPE_COURSE, $id);
            }
            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
