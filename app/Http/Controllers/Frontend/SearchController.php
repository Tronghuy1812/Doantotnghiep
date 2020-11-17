<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education\Course;
use App\Models\KeywordSearch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\AbstractList;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->k;
        if (!$keyword) return redirect()->to('/');
        $this->syncKeywordSearch($keyword);
        $courses = Course::with('teacher:id,t_name,t_avatar,t_slug,t_job')
            ->where('c_name', 'like', '%' . $keyword . '%')
            ->where('c_status', Course::STATUS_DEFAULT)
            ->orderByDesc('id')
            ->paginate(12);

        $viewData = [
            'courses' => $courses
        ];

        return view('pages.category.index', $viewData);
    }

    protected function syncKeywordSearch($keyword)
    {
        $slug = Str::slug($keyword);
        $checkKeyword = KeywordSearch::where('ks_slug', $slug)->first();
        if (!$checkKeyword) {
            KeywordSearch::insert([
                'ks_name' => $keyword,
                'ks_slug' => $slug,
                'ks_count' => str_word_count($keyword),
                'created_at' => Carbon::now()
            ]);
            return true;
        }
        $checkKeyword->ks_total_count_search += 1;
        $checkKeyword->save();
    }
}
