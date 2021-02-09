<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\CourseResult;
use App\Models\CourseResultDashboard;
use App\Models\Education\Course;
use App\Models\Education\SeoEdutcation;
use App\Models\Question;
use Illuminate\Http\Request;

class CourseMultipleChoiceController extends Controller
{
    /**
     * @param Request $request
     * @param $slug
     * @return
     * form thi
     */
    public function index(Request $request, $slug)
    {
        $slugMd5 = md5($slug);
        $urlSeo  = SeoEdutcation::where([
            'se_md5'  => $slugMd5,
            'se_type' => SeoEdutcation::TYPE_COURSE
        ])->first();
        if ($urlSeo && $id = $urlSeo->se_id) {
            $courseDetail = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
                ->where([
                    'id'       => $id,
                    'c_status' => Course::STATUS_DEFAULT
                ])->first();

            if (!$courseDetail) return abort(404);

            // Hiển thị bài học
            $questions = Question::with('answers')
                ->where('q_course_id', $courseDetail->id)
                ->orderByDesc('id')
                ->get();

            \SEOMeta::setTitle("Làm trắc nghiệm : " . $courseDetail->c_name);

            $viewData = [
                'courseDetail' => $courseDetail,
                'questions'    => $questions
            ];

            return view('pages.course.multiple_choice', $viewData);
        }

        return redirect()->to('/');
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|void
     * Xử lý kết quả
     */
    public function processMultipleChoice(Request $request, $slug)
    {
        $answers = $request->answers;
        if (!is_array($answers)) {
            return redirect()->back()->with("error", "Mời bạn chọn câu trả lời");
        }

        $slugMd5 = md5($slug);
        $urlSeo  = SeoEdutcation::where([
            'se_md5'  => $slugMd5,
            'se_type' => SeoEdutcation::TYPE_COURSE
        ])->first();


        if ($urlSeo && $id = $urlSeo->se_id) {
            $courseDetail = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
                ->where([
                    'id'       => $id,
                    'c_status' => Course::STATUS_DEFAULT
                ])->first();

            if (!$courseDetail) return abort(404);

            // danh sách đáp án đúng của khoá học
            dump($courseDetail->id);

            // lấy mảng đáp án key là ID đáp án / value là id câu hỏi
            $correctsAnswers = \DB::table('corrects_answers')
                    ->where('ca_course_id', $courseDetail->id)
                    ->pluck('ca_question_id', 'ca_answer_id')
                    ->toArray() ?? [];


            dump($answers, "mảng đáp án người dùng chọn");
            dump($correctsAnswers, "mảng đáp án chính thức");
            $wrong = 0;
            $empty = 0;
            foreach ($answers as $key => $answer) {
                if (!array_key_exists($key, $correctsAnswers)) {
                    $wrong++;
                }
            }

            if (count($answers) < count($correctsAnswers)) {
                $empty = count($correctsAnswers) - count($answers);
            }

            dump($wrong, "Số câu sai");
            dump(count($correctsAnswers) - $wrong - $empty, "Số câu đúng");
            dump($empty, "Số câu không chọn");

            // lưu thống kê
            $resultDashboard = CourseResultDashboard::create([
                'crd_total_answer'         => count($correctsAnswers),
                'crd_total_correct_answer' => count($correctsAnswers) - $wrong - $empty,
                'crd_total_correct_empty'  => count($correctsAnswers) - $wrong - $empty,
                'crd_total_correct_wrong'  => $wrong,
                'crd_user_id'              => get_data_user('web'),
                'crd_course_id'            => $courseDetail->id
            ]);

            // Lưu đáp án chi tiết
            if ($resultDashboard) {
                foreach ($answers as $key => $answer) {
                    $flag = 2;
                    if (array_key_exists($key, $correctsAnswers)) {
                        $flag = 1;
                    }
                    $answerQuery = Answer::find($key);
                    CourseResult::insert([
                        'cr_question_id'      => $answerQuery->a_question_id,
                        'cr_user_id'          => get_data_user('web'),
                        'cr_course_id'        => $courseDetail->id,
                        'cr_answer_id'        => $answerQuery->id,
                        'cr_result_dashboard' => $resultDashboard->id,
                        'cr_flag_result'      => $flag,
                    ]);
                }
            }

            return redirect()->route('get.course.multiple_choice.result', ['slug' => $courseDetail->c_slug . '-cr']);
        }
    }

    /**
     * @param Request $request
     * @param $slug
     * @return
     * Hiển thị kết quả
     */
    public function resultMultipleChoice(Request $request, $slug, $position = null)
    {
        $slugMd5 = md5($slug);
        $urlSeo  = SeoEdutcation::where([
            'se_md5'  => $slugMd5,
            'se_type' => SeoEdutcation::TYPE_COURSE
        ])->first();
        if ($urlSeo && $id = $urlSeo->se_id) {
            $courseDetail = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
                ->where([
                    'id'       => $id,
                    'c_status' => Course::STATUS_DEFAULT
                ])->first();

            if (!$courseDetail) return abort(404);

            // Hiển thị bài làm
            $questions = Question::with('answers')
                ->where('q_course_id', $courseDetail->id)
                ->orderByDesc('id')
                ->get();

            // lấy danh sách đã thi
            $resultsAnswerDashboard = CourseResultDashboard::where([
                'crd_user_id'   => get_data_user('web'),
                'crd_course_id' => $courseDetail->id
            ])->get();

            // lấy kết quả từng đáp án ra hiển thị
            $resultsQuestion = CourseResult::where([
                'cr_course_id' => $courseDetail->id,
                'cr_user_id'   => get_data_user('web')
            ]);

            if (!$position) {
                $resultLast = $resultsAnswerDashboard->last() ?? 0;
                if (isset($resultLast->id))
                    $position = $resultLast->id;
            }

            $resultsQuestion = $resultsQuestion->where('cr_result_dashboard', $position)
                ->pluck('cr_flag_result', 'cr_answer_id')
                ->toArray();

            \SEOMeta::setTitle("Kết quả làm trắc nghiệm : " . $courseDetail->c_name);

            $viewData = [
                'courseDetail'           => $courseDetail,
                'questions'              => $questions,
                'position'               => $position,
                'resultsAnswerDashboard' => $resultsAnswerDashboard,
                'resultsQuestion'        => $resultsQuestion
            ];

            return view('pages.course.result_choice', $viewData);
        }

        return redirect()->to('/');
    }
}
