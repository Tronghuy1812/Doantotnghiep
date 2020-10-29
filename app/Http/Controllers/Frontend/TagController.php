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

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
        ->whereHas('tags', function($query) use ($id){
            $query->where('ct_tag_id', $id);
        })->where('c_status',Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(12);

        $viewData = [
            'courses' => $courses,
            'tag' => $tag
        ];

        return view('pages.tag.index', $viewData);
    }
}
