<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseFavouriteController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Khoá học yêu thích');
        return view('pages.favourite.index');
    }
}
