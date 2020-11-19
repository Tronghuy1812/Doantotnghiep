<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Menu;

class BlogHomeController extends BlogController
{
    public function index()
    {
        \SEOMeta::setTitle('Blog Trang chủ');
        \SEOMeta::setDescription('Blog Trang chủ');
        \SEOMeta::setCanonical(\Request::url());

        // Bài viết banner
        $articlesHotOne = Article::with('menu:id,m_name,m_slug')->orderByDesc('id')
            ->limit(4)
            ->select('id', 'a_name', 'a_slug', 'a_avatar', 'created_at', 'a_menu_id')
            ->get();


        $menuPositionOne = Menu::with('articles')
            ->where('m_position', 1)
            ->first();

        $menuPositionTwo = Menu::with('articles')
            ->where('m_position', 2)
            ->first();

        $viewData = [
            'articlesHotOne' => $articlesHotOne,
            'menuPositionOne' => $menuPositionOne,
            'menuPositionTwo' => $menuPositionTwo,
        ];

        return view('blog::pages.home.index', $viewData);
    }
}
