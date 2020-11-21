<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\Course;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCourseVoteController extends Controller
{
    public function index($id, Request $request)
    {
        $votes = Vote::with('user:id,name,avatar')->where('v_id', $id)
            ->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'id'    => $id,
            'votes' => $votes
        ];
        return view('admin::pages.course_vote.index', $viewData);
    }

    public function delete($id, $voteID, Request $request)
    {
        if($request->ajax())
        {
            $course = Course::findOrFail($id);
            $vote = Vote::find($voteID);
            if ($course && $vote)
            {
                $course->c_total_evaluate -= 1;
                $course->c_total_star     -= $vote->v_numner;
                $course->save();
                $vote->delete();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
