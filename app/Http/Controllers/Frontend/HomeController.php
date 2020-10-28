<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\Tag;
use App\Models\Education\Teacher;
use App\Models\System\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //. Tag noi bat
        $tagsHot = Tag::where('t_hot', Tag::HOT)
            ->orderByDesc('t_sort')
            ->limit(10)
            ->select('t_name', 't_hot', 'id', 't_slug')
            ->get();

        // khoa hoc khong dong
        $coursesFree = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')->where('c_price', 0)
            ->orderByDesc('id')
            ->limit(16)
            ->get();

        // danh muc cap 1
        $categoriesParent = Category::where('c_parent_id', 0)
            ->orderByDesc('c_sort')
            ->select('id', 'c_name', 'c_icon', 'c_slug', 'c_avatar')
            ->get();

        // lay slide
        $slides = Slide::where('s_status', Slide::STATUS_DEFAULT)
            ->orderBy('s_sort', 'asc')
            ->get();

        // lay giao vien
        $teachers =  Teacher::orderByDesc('id')->get();


        $viewData = [
            'tagsHot' => $tagsHot,
            'coursesFree' => $coursesFree,
            'categoriesParent' => $categoriesParent,
            'slides' => $slides,
            'teachers' => $teachers
        ];

        return view('pages.home.index', $viewData);
    }
}
