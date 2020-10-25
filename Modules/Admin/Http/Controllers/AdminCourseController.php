<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\Teacher;
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

        $viewData = [
            'categories' => $categories,
            'teachers' => $teachers
        ];

        return view('admin::pages.course.create', $viewData);
    }

    public function store(AdminCourseRequest  $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if(!$request->c_sale )  $data['c_sale'] = 0;
        if(!$request->c_total_time )  $data['c_total_time'] = 0;
        if(!$request->c_price )  $data['c_price'] = 0;

        $courseID = Course::insertGetId($data);
        if($courseID)
        {
            $this->showMessagesSuccess();
            return redirect()->route('get_admin.course.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $viewData = [
            'course' => $course
        ];
        return view('admin::pages.course.update', $viewData);
    }

    public function update(AdminCourseRequest $request,$id)
    {
        $course = Course::findOrFail($id);
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();

        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if(!$request->c_sale )  $data['c_sale'] = 0;
        if(!$request->c_total_time )  $data['c_total_time'] = 0;
        if(!$request->c_price )  $data['c_price'] = 0;

        $course->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.course.index');
    }

    public function delete(Request  $request, $id)
    {
        if($request->ajax())
        {
            $course = Course::findOrFail($id);
            if ($course) $course->delete();;
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
