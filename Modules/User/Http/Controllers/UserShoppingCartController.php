<?php

namespace Modules\User\Http\Controllers;

use App\Models\Education\Course;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

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

                $listCarts = \Cart::content();

                // Kierm tra xem đã lưu khoá học chưa
                $checkExist = $listCarts->search(function ($cartItem) use ($id) {
                    if($cartItem->id == $id) return $id;
                });

                // Nếu chưa có giỏ hàng thì mặc định thêm
                if($listCarts->isEmpty() || !$checkExist) {
                    Log::info("[Cart]: Empty" );
                    \Cart::add([
                        'id' => $id,
                        'name' => $course->c_name,
                        'qty' => 1,
                        'price' => $course->c_price,
                        'weight' => 1,
                        'options' => [
                            'images' => pare_url_file($course->c_avatar),
                            'sale' => $course->c_sale
                        ]
                    ]);
                }

                return response([
                    'status' => 200,
                    'message' => !$checkExist ? "Mua khoá học thành công" : "Khoá học đã tồn tại"
                ]);
            }
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
