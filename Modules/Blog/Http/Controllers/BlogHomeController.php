<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogHomeController extends BlogController
{
    public function index()
    {
        \SEOMeta::setTitle('Blog Trang chủ');
        \SEOMeta::setDescription('Blog Trang chủ');
        \SEOMeta::setCanonical(\Request::url());

        $articlesHotOne = Article::with('menu:id,m_name,m_slug')->orderByDesc('id')
            ->limit(4)
            ->select('id','a_name','a_slug','a_avatar','created_at','a_menu_id')
            ->get();

        $viewData = [
            'articlesHotOne' => $articlesHotOne
        ];

        return view('blog::pages.home.index', $viewData);
    }
}
