<?php

namespace Modules\User\Http\Controllers;

use App\Models\Education\Course;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserShoppingCartController extends UserController
{
    const COMBO = 'combo';
    const COURSE = 'course';
    public function processCart(Request $request, $id, $type = 'course')
    {
        if ($request->ajax())
        {
            if($type == self::COMBO)
            {
                // Xử lý dữ liệu combo
            }else{
                // xử lý dữ liệu với khoá học
                $course = $this->checkCourse($id);
                if (!$course){
                    return response([
                       'status' => 404
                    ]);
                }
            }
            return response([
                'status' => 200
            ]);

        }
    }

    protected function checkCourse($id)
    {
        return Course::find($id);
    }

    protected function checkCombo($id)
    {

    }





}
