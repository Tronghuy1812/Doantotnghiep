<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogMenuController extends Controller
{
    public function getArticleByMenu($id, $request)
    {
        return view('blog::pages.menu.index');
    }
}
