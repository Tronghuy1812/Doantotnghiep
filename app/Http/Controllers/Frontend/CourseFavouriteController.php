<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class CourseFavouriteController extends Controller
{
    public function index()
    {
        $idUser = get_data_user('web');
        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->whereHas('favourite', function($query) use ($idUser){
                $query->where('f_user_id', $idUser);
            })->where('c_status',Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(12);


        \SEOMeta::setTitle('Khoá học yêu thích');
        $viewData = [
            'courses' => $courses
        ];
        return view('pages.favourite.index', $viewData);
    }
}
