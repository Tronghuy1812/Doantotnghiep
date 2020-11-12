<?php

namespace App\Http\Controllers\Frontend\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Cart\Order;
use App\Models\Education\CourseVideo;
use Illuminate\Http\Request;

class AjaxUserViewCourseController extends Controller
{
    public function viewCourseByVideoID(Request $request, $id)
    {
        if($request->ajax())
        {
            $user = $this->getUser();
            if(!$user) {
                return response([
                    'status' => 401,
                    'message' => "Mời bạn đăng nhập"
                ]);
            }

            $video = CourseVideo::find($id);
            if (!$video) {
                return response([
                    'status' => 404,
                    'message' => "Không tồn tại video khoá học"
                ]);
            }


            // check xem đã mua khoá học chưa
            $order = Order::where([
                'o_user_id' => $user->id,
                'o_action_id' => $video->cv_course_id
            ])->first();
            if (!$order) {
                return response([
                    'status' => 404,
                    'message' => "Bạn chưa mua khoá học này"
                ]);
            }


            return response([
                'status' => 200,
                'data' => $user
            ]);
        }
    }

    protected function getUser()
    {
        return \Auth::guard('web')->user();
    }
}
