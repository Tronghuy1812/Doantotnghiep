<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use Illuminate\Http\Request;

class CoursePaySellingController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Khoá học bán chạy');

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_status',Course::STATUS_DEFAULT)
            ->where('c_total_pay','>',0)
            ->orderBy('c_total_pay','desc')
            ->paginate(12);

        $viewData = [
            'courses' => $courses
        ];

        return view('pages.pay_selling.index', $viewData);
    }
}
