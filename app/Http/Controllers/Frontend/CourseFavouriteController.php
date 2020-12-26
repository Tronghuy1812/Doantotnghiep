<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class CourseFavouriteController extends Controller
{
    public function index(Request $request)
    {
        $idUser  = get_data_user('web');
        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->whereHas('favourite', function ($query) use ($idUser) {
                $query->where('f_user_id', $idUser);
            })->where('c_status', Course::STATUS_DEFAULT);

        if ($level = $request->level) $courses->where('c_level', $level);
        if ($time = $request->time) {
            if ($time == 1) {
                $courses->where('c_total_time', '<=', 3);
            } else {
                $courses->where('c_total_time', '>', 3);
            }
        }

        $courses = $courses
            ->orderByDesc('id')
            ->paginate(12);

        $level = (new Course())->level;
        \SEOMeta::setTitle('Khoá học yêu thích');
        $viewData = [
            'courses' => $courses,
            'level'   => $level
        ];
        return view('pages.favourite.index', $viewData);
    }
}
