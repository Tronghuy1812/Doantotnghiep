<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use App\Models\Education\SeoEdutcation;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminCategoryRequest;

class AdminCategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::orderByDesc('c_sort')
            ->paginate(20);

        $viewData = [
            'categories' => $categories
        ];
        return view('admin::pages.category.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.category.create');
    }

    public function store(AdminCategoryRequest  $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;

        $categoryID = Category::insertGetId($data);
        if($categoryID)
        {
            $this->showMessagesSuccess();
            RenderUrlSeoCourseService::init($request->c_slug,SeoEdutcation::TYPE_CATEGORY, $categoryID);
            return redirect()->route('get_admin.category.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin::pages.category.update',compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();

        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;

        $category->fill($data)->save();
        RenderUrlSeoCourseService::init($request->c_slug,SeoEdutcation::TYPE_CATEGORY, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.category.index');
    }


    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $category = Category::find($id);
            if ($category)
            {
                $category->delete();
                RenderUrlSeoCourseService::deleteUrlSeo(SeoEdutcation::TYPE_CATEGORY, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');

    }
}
