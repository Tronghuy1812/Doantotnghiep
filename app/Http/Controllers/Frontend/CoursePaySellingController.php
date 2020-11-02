<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursePaySellingController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Khoá học bán chạy');
        return view('pages.pay_selling.index');
    }
}
