<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        return view('pages.home.index', compact('collection'));
    }
}
