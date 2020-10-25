<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //. Tag noi bat
        $tagsHot = Tag::where('t_hot', Tag::HOT)
            ->orderByDesc('t_sort')
            ->limit(10)
            ->select('t_name','t_hot','id','t_slug')
            ->get();

        $viewData  = [
            'tagsHot' => $tagsHot
        ];

        return view('pages.home.index', $viewData);
    }
}
