<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::pages.tag.index');
    }

    public function create()
    {
        return view('admin::pages.tag.create');
    }

    public function store()
    {

    }
}
