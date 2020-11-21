<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use App\Models\Education\Course;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserVoteController extends Controller
{
    public function vote($idTransaction, $idCourse, Request $request)
    {
        $viewData = [
            'idCourse'      => $idCourse,
            'idTransaction' => $idTransaction
        ];
        return view('user::pages.transaction.detail.vote', $viewData);
    }

    public function storeVote($idTransaction, $idCourse, Request $request)
    {
        $content = $request->content_review;
        $vote    = $request->review;

        $idVote = Vote::insertGetId([
            'v_user_id' => get_data_user('web'),
            'v_id'      => $idCourse,
            'v_type'    => Vote::TYPE_COURSE,
            'v_content' => $content,
            'v_number'  => $vote
        ]);

        if($idVote)
        {
            $course = Course::find($idCourse);
            $course->c_total_evaluate += 1;
            $course->c_total_star += $vote;
            $course->save();
        }

        return redirect()->back();
    }

}
