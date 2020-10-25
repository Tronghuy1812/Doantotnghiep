<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminTeacherRequest;

class AdminTeacherController extends AdminController
{
    public function index()
    {
        $teachers = Teacher::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'teachers' => $teachers
        ];
        return view('admin::pages.teacher.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.teacher.create');
    }

    public function store(AdminTeacherRequest $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        $teacherID = Teacher::insertGetId($data);
        if($teacherID)
        {
            $this->showMessagesSuccess();
            return redirect()->route('get_admin.teacher.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return view('admin::pages.teacher.update', compact('teacher'));
    }

    public function update(AdminTeacherRequest  $request, $id)
    {
        $teacher = Teacher::find($id);
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();

        $teacher->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.teacher.index');
    }

    public function delete($id, Request  $request)
    {
        if($request->ajax())
        {
            $teacher = Teacher::find($id);
            if ($teacher) $teacher->delete();;
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
