<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Answer;
use App\Models\CorrectAnswer;
use App\Models\Education\Course;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminCourseQuestionController extends Controller
{
    public function index($id)
    {
        $questions = Question::with('answers', 'correctsAnswers')->orderByDesc('id')
            ->paginate(20);
//        dd($questions);
        $viewData = [
            'questions' => $questions,
            'id'        => $id
        ];
        return view('admin::pages.course_question.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $viewData = [
            'id' => $id
        ];

        return view('admin::pages.course_question.create', $viewData);
    }

    public function store(Request $request, $id)
    {
        $data           = $request->except('_token', 'a_name', 'a_correct');
        $data['q_slug'] = Str::slug($request->q_name);
        $question       = Question::create($data);

        if ($request->a_name)
            $this->syncAnswers($question->id, $request->a_name);

        return redirect()->back();
    }

    public function edit($id, $questId)
    {
        $question = Question::find($questId);
        $answers  = Answer::where('a_question_id', $questId)->get();
        $viewData = [
            'id'       => $id,
            'answers'  => $answers,
            'question' => $question
        ];

        return view('admin::pages.course_question.update', $viewData);
    }

    public function update(Request $request, $id, $questId)
    {
        $data           = $request->except('_token', 'a_name', 'a_correct', 'answersCorrect');
        $data['q_slug'] = Str::slug($request->q_name);
        $question       = Question::find($questId);
        if ($request->a_name)
            $this->syncAnswers($questId, $request->a_name, $request->answersCorrect);

        $question->fill($data)->save();
        return redirect()->back();
    }

    public function syncAnswers($courseID, $answers = [], $answersCorrect = [])
    {
        foreach ($answers as $key => $item) {
            if (!empty($answersCorrect) && isset($answersCorrect[$key])) {
                Answer::find($answersCorrect[$key])->update([
                    'a_name'        => $item,
                    'a_question_id' => $courseID,
                    'updated_at'    => Carbon::now()
                ]);
            } else {
                Answer::insert([
                    'a_name'        => $item,
                    'a_question_id' => $courseID,
                    'created_at'    => Carbon::now()
                ]);
            }
        }
    }

    public function success(Request $request, $id, $questId, $answerId)
    {
        $question = Question::find($questId);
        if ($question) {
            // kiểm tra xem đã lưu đáp án đúng chưa
            $correctsAnswers = CorrectAnswer::where([
                'ca_course_id' => $id,
                'ca_answer_id' => $questId
            ])->first();

            // Tồn tại thì huỷ bỏ. không tồn tại thì thêm mới
            if ($correctsAnswers) {
                $correctsAnswers->delete();
            } else {
                CorrectAnswer::insert([
                    'ca_course_id'   => $id,
                    'ca_answer_id'   => $answerId,
                    'ca_question_id' => $questId,
                    'created_at'     => Carbon::now()
                ]);
            }
        }

        return redirect()->back();
    }
}
