<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserCourseByOrderController extends Controller
{
    public function viewCourse($idTransaction, $idCourse, Request $request)
    {
        $viewData = [
            'idTransaction' => $idTransaction,
            'idCourse'      => $idCourse
        ];

        return view('user::pages.transaction.detail.index', $viewData);
    }
}
