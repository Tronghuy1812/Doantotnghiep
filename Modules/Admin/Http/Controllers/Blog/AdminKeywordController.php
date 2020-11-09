<?php

namespace Modules\Admin\Http\Controllers\Blog;

use App\Models\Blog\Keyword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\AdminKeywordRequest;

class AdminKeywordController extends AdminController
{
    public function index()
    {
        $keywords = Keyword::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'keywords' => $keywords
        ];

        return view('admin::pages.blog.keyword.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.blog.keyword.create');
    }

    public function store(AdminKeywordRequest $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        if(!$request->k_title_seo)             $data['k_title_seo'] = $request->k_name;
        if(!$request->k_description_seo) $data['k_description_seo'] = $request->k_name;


        $keywordID = Keyword::insertGetId($data);
        if($keywordID)
        {
            $this->showMessagesSuccess();
//            RenderUrlSeoCourseService::init($request->t_slug,SeoEdutcation::TYPE_TAG, $tagID);
            return redirect()->route('get_admin.keyword.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $keyword = Keyword::findOrFail($id);
        return view('admin::pages.blog.keyword.update', compact('keyword'));
    }
    public function update(AdminKeywordRequest $request, $id)
    {
        $keyword = Keyword::findOrFail($id);
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();

        if(!$request->k_title_seo)             $data['k_title_seo'] = $request->k_name;
        if(!$request->k_description_seo) $data['k_description_seo'] = $request->k_name;

        $keyword->fill($data)->save();
//        RenderUrlSeoCourseService::init($request->t_slug,SeoEdutcation::TYPE_TAG, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.keyword.index');
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $keyword = Keyword::findOrFail($id);
            if ($keyword){
                $keyword->delete();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
