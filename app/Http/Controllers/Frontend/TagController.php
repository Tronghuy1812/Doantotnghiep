<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Education\Tag;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getCourseByTag($id, $request)
    {
        $tag = Tag::find($id);
        if (!$tag) return abort('404');

        $level = (new Course())->level;

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->whereHas('tags', function ($query) use ($id) {
                $query->where('ct_tag_id', $id);
            })->where('c_status', Course::STATUS_DEFAULT);

        if ($lv = $request->level) $courses->where('c_level', $lv);
        if ($time = $request->time)
        {
            if($time == 1)
            {
                $courses->where('c_total_time', '<=', 3);
            } else{
                $courses->where('c_total_time', '>', 3);
            }
        }

        $courses = $courses
            ->orderByDesc('id')
            ->paginate(12);

        $viewData = [
            'courses' => $courses,
            'tag'     => $tag,
            'level'   => $level
        ];

        return view('pages.tag.index', $viewData);
    }
}
