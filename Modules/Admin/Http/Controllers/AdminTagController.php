<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\AdminTagRequest;

class AdminTagController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tags = Tag::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'tags' => $tags
        ];

        return view('admin::pages.tag.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.tag.create');
    }

    public function store(AdminTagRequest $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        if(!$request->t_title_seo)             $data['t_title_seo'] = $request->t_name;
        if(!$request->t_description_seo) $data['t_description_seo'] = $request->t_name;

        $tagID = Tag::insertGetId($data);
        if($tagID)
        {
            $this->showMessagesSuccess();
            return redirect()->route('get_admin.tag.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin::pages.tag.update', compact('tag'));
    }
    public function update(AdminTagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();

        if(!$request->t_title_seo)             $data['t_title_seo'] = $request->t_name;
        if(!$request->t_description_seo) $data['t_description_seo'] = $request->t_name;

        $tag->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.tag.index');
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        if ($tag) $tag->delete();

        $this->showMessagesSuccess("Xử lý dữ liệu thành công");
        return redirect()->route('get_admin.tag.index');
    }
}
