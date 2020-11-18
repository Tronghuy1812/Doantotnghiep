<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogArticleController extends Controller
{
    public function getArticleById($id, $request)
    {
        return view('blog::pages.article.index');
    }
}
