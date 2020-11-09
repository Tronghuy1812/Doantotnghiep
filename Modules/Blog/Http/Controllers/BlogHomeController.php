<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogHomeController extends BlogController
{
    public function index()
    {
        return view('blog::pages.home.index');
    }
}
