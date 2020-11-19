<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use Illuminate\Routing\Controller;

class BlogArticleController extends Controller
{
    public function getArticleById($id, $request)
    {
        $article = Article::with('menu:id,m_name,m_slug')->find($id);
        if (!$article) return about(404);

        $articlesRelate = Article::where('a_menu_id', $article->a_menu_id)
            ->select('id', 'a_name', 'a_slug', 'a_avatar', 'a_description')
            ->orderByDesc('id')
            ->get(10);


        \SEOMeta::setTitle($article->a_name);
        \SEOMeta::setDescription($article->a_name);
        \SEOMeta::setCanonical(\Request::url());

        $viewData = [
            'articlesRelate' => $articlesRelate,
            'article' => $article
        ];

        return view('blog::pages.article.index', $viewData);
    }
}
