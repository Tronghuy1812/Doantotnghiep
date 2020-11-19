<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Menu;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogMenuController extends Controller
{
    public function getArticleByMenu($id, $request)
    {
        $menu = Menu::find($id);
        if (!$menu) return abort(404);

        $articles = Article::where('a_menu_id', $id)
            ->select('id', 'a_name', 'a_slug', 'a_avatar', 'a_description')
            ->paginate(20);

        \SEOMeta::setTitle($menu->m_name);
        \SEOMeta::setDescription($menu->m_name);
        \SEOMeta::setCanonical(\Request::url());

        $viewData = [
            'articles' => $articles,
            'menu' => $menu
        ];

        return view('blog::pages.menu.index', $viewData);
    }
}
