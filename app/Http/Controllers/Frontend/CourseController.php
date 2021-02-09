<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\Education\CourseContent;
use App\Models\Education\CourseVideo;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourseDetail($id, $request)
    {
        $courseDetail = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where([
                'id'       => $id,
                'c_status' => Course::STATUS_DEFAULT
            ])->first();

        if (!$courseDetail) return abort(404);

        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_status', Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(3);

        $courseContent = CourseContent::with('videos')->where('cc_course_id', $id)
            ->orderBy('cc_sort', 'asc')
            ->get();

        $courseVideo = CourseVideo::where('cv_course_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        // lấy đánh giá của khoá học
        $votes = Vote::with('user:id,name,avatar')->where('v_id', $id)
            ->orderByDesc('id')
            ->paginate(20);

        // Hiển thị bài học
        $questions = Question::with('answers')
            ->where('q_course_id', $courseDetail->id)
            ->orderByDesc('id')
            ->limit(2)
            ->get();

        //3 Hiển thị thông kê
        $votesDashboard = Vote::groupBy('v_number')
            ->where('v_id', $id)
            ->select(\DB::raw('count(v_number) as count_number'), \DB::raw('sum(v_number) as total'))
            ->addSelect('v_number')
            ->get()->toArray();

        $voteDefault = $this->mapRatingDefault();

        foreach ($votesDashboard as $key => $item) {
            $voteDefault[$item['v_number']] = $item;
        }

        $votesDashboard = $voteDefault;
        \SEOMeta::setTitle($courseDetail->c_name);

        $viewData = [
            'courses'        => $courses,
            'votes'          => $votes,
            'courseContent'  => $courseContent,
            'votesDashboard' => $votesDashboard,
            'courseDetail'   => $courseDetail,
            'courseVideo'    => $courseVideo,
            'questions'      => $questions
        ];

        return view('pages.course.index', $viewData);
    }

    private function mapRatingDefault()
    {
        $ratingDefault = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingDefault[$i] = [
                "count_number" => 0,
                "total"        => 0,
                "v_number"     => 0
            ];
        }

        return $ratingDefault;
    }
}
