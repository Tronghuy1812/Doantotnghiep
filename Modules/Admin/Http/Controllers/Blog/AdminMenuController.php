<?php

namespace Modules\Admin\Http\Controllers\Blog;

use App\Models\Blog\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\AdminMenuRequest;

class AdminMenuController extends AdminController
{
    public function index()
    {
        $menus = Menu::orderByDesc('m_sort')
            ->paginate(20);

        $viewData = [
            'menus' => $menus
        ];
        return view('admin::pages.blog.menu.index', $viewData);
    }

    public function create()
    {
        $menus = Menu::orderByDesc('m_sort')->get();

        return view('admin::pages.blog.menu.create',compact('menus'));
    }

    public function store(AdminMenuRequest  $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        if(!$request->m_title_seo)             $data['m_title_seo'] = $request->m_name;
        if(!$request->m_description_seo) $data['m_description_seo'] = $request->m_name;

        $menuID = Menu::insertGetId($data);
        if($menuID)
        {
            $this->showMessagesSuccess();
//            RenderUrlSeoCourseService::init($request->c_slug,SeoEdutcation::TYPE_CATEGORY, $categoryID);
            return redirect()->route('get_admin.menu.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $menus = Menu::orderByDesc('m_sort')->get();
        return view('admin::pages.blog.menu.update',compact('menu','menus'));
    }

    public function update(AdminMenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $data = $request->except(['avatar','save','_token','c_position_1']);
        $data['updated_at'] = Carbon::now();

        if(!$request->m_title_seo)             $data['m_title_seo'] = $request->m_name;
        if(!$request->m_description_seo) $data['m_description_seo'] = $request->m_name;

        $menu->fill($data)->save();
//        RenderUrlSeoCourseService::init($request->c_slug,SeoEdutcation::TYPE_CATEGORY, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.menu.index');
    }


    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $menu = Menu::findOrFail($id);
            if ($menu)
            {
                $menu->delete();
//                RenderUrlSeoCourseService::deleteUrlSeo(SeoEdutcation::TYPE_CATEGORY, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
