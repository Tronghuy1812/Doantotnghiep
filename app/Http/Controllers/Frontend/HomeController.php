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

        // Khoá học nổi bật ở vị trí thứ 1
        $coursesHotPositionOne = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where([
                'c_position_1' => 1,
                'c_hot' => 1
            ])
            ->orderByDesc('id')
            ->limit(8)
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
        // show category nổi bật trang chủ`

        $categoriesHotHome = Category::where([
            'c_hot' => 1,
            'c_position_1' => 1
        ])
            ->orderByDesc('c_sort')
            ->select('id', 'c_name', 'c_icon', 'c_slug', 'c_avatar')
            ->get();

        // lay slide
        $slides = Slide::where('s_status', Slide::STATUS_DEFAULT)
            ->orderBy('s_sort', 'asc')
            ->get();

        // lay giao vien
        $teachers = Teacher::orderByDesc('id')->get();

        \SEOMeta::setTitle('Đây là trang chủ');
        \SEOMeta::setDescription('Đây là mô tả');
        \SEOMeta::setCanonical(\Request::url());
        \OpenGraph::setDescription('Đây là mô tả');
        \OpenGraph::setTitle('Đây là trang chủ');
        \OpenGraph::setUrl(\Request::url());
        \OpenGraph::addProperty('type', 'articles');

        $viewData = [
            'tagsHot' => $tagsHot,
            'coursesFree' => $coursesFree,
            'categoriesParent' => $categoriesParent,
            'slides' => $slides,
            'categoriesHotHome' => $categoriesHotHome,
            'coursesHotPositionOne' => $coursesHotPositionOne,
            'teachers' => $teachers
        ];

        return view('pages.home.index', $viewData);
    }
}
