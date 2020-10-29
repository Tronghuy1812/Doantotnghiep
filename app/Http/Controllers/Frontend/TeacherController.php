<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function getCourseByTeacherSlug(Request $request)
    {
        return view('pages.teacher.course');
    }
}
