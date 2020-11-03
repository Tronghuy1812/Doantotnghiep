<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user::pages.dashboard.index');
    }
}
