<?php

namespace Modules\User\Http\Controllers;

use App\Models\Education\CourseContent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserCourseByOrderController extends Controller
{
    public function viewCourse($idTransaction, $idCourse, Request $request)
    {
        \SEOMeta::setTitle('Nội dung khoá học');

        $courseContent = CourseContent::with('videos')->where('cc_course_id', $idCourse)
            ->orderBy('cc_sort', 'asc')
            ->get();

        $viewData = [
            'idTransaction' => $idTransaction,
            'idCourse'      => $idCourse,
            'courseContent' => $courseContent
        ];

        return view('user::pages.transaction.detail.index', $viewData);
    }
}
