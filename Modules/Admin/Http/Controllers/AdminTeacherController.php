<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\Tag;
use App\Models\Education\Teacher;
use App\Models\Education\TeacherTag;
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
        $tags = Tag::all();
        $tagOld = [];
        return view('admin::pages.teacher.create', compact('tags', 'tagOld'));
    }

    public function store(AdminTeacherRequest $request)
    {
        $data = $request->except(['avatar', 'save', '_token', 'tags']);
        $data['created_at'] = Carbon::now();

        $teacherID = Teacher::insertGetId($data);
        if ($teacherID) {
            $this->showMessagesSuccess();
            $this->syncTagTeacher($teacherID, $request->tags);
            return redirect()->route('get_admin.teacher.index');
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    protected function syncTagTeacher($teacherID, $tags)
    {
        if (!empty($tags)) {
            \DB::table('teachers_tags')->where('tt_teacher_id', $teacherID)->delete();
            foreach ($tags as $item) {
                TeacherTag::insert([
                    'tt_teacher_id' => $teacherID,
                    'tt_tag_id' => $item
                ]);
            }
        }
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $tags = Tag::all();

        $tagOld = TeacherTag::where('tt_teacher_id', $id)
                ->pluck('tt_tag_id')
                ->toArray() ?? [];

        return view('admin::pages.teacher.update', compact('teacher', 'tags', 'tagOld'));
    }

    public function update(AdminTeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        $data = $request->except(['avatar', 'save', '_token', 'tags']);
        $data['updated_at'] = Carbon::now();

        $teacher->fill($data)->save();

        $this->syncTagTeacher($id, $request->tags);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.teacher.index');
    }

    public function delete($id, Request $request)
    {
        if ($request->ajax()) {
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
