<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\SeoEdutcation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HubCourseController extends Controller
{
    public function render(Request $request, $slug)
    {
        $slugMd5 = md5($slug);

        $urlSeo = SeoEdutcation::where('se_md5', $slugMd5)->first();
        if($urlSeo) {
            $type = $urlSeo->se_type;
            switch ($type)
            {
                case SeoEdutcation::TYPE_CATEGORY:
                    return (new CategoryController())->getCourseByCategory($urlSeo->se_id, $request);

                case SeoEdutcation::TYPE_COURSE:
                    return (new CourseController())->getCourseDetail($urlSeo->se_id, $request);

                case SeoEdutcation::TYPE_TAG:
                    return (new TagController())->getCourseByTag($urlSeo->se_id, $request);

            }
        }

        return redirect()->route('get.category.all');

    }
}
