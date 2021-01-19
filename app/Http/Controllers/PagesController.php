<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Database\Eloquent\Builder;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @author Khurshid Yakubov khurshid.yakubov@gmail.com
     */
    public function index(Request $request)
    {
        $pages = Page::paginate(6);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Page $page)
    {
        $request->validate([
            'title' => '',
            'body' => '',
            'description' => '',
            'slug' => '',
            'static' => ''
        ]);

        $page_data = [
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body,
                'description' => $request->oz_description,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
                'description' => $request->uz_description,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
                'description' => $request->ru_description,
            ],
        ];

        $arr = [];
        foreach ($page_data as $titles) {
            $arr[] = $titles['title'];
            foreach ($arr as $title) {
                if (isset($title)) {
                    $get_slug_element = $page->makeSlug($title);
                    break;
                }
            }
        }
        $page_data['slug'] = $get_slug_element;

        $model = Page::create($page_data);

//        $for_slug = $request->oz_title;
//        if (empty($for_slug)) {
//            $for_slug = $request->uz_title;
//            if (empty($request->uz_title)){
//                $for_slug = $request->ru_title;
//            }
//        }

//        $post = new Page([
//            'title' => $for_slug,
//        ]);
//        $post->save();

//        dd($model['translations']);
//        $arr = [];
//        foreach ($model['translations'] as $one) {
//            $arr[] = $one['title'];
//        }
//        foreach ($arr as $one) {
//            if (isset($one)) {
//                $get_slug_element = $one;
//                break;
//            }
//        }
//        dd($get_slug_element);

        return redirect()->route('pages.show', $model->id)->with('success', __('main.create_msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function show($id)
    {
        $post_view = Page::findOrFail($id);
        return view('admin.pages.show', compact('post_view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Page::findOrFail($id);
        return view('admin.pages.edit', compact('post',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => '',
            'body' => '',
            'description' => '',

        ]);

        $page_data = [
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body,
                'description' => $request->oz_description,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
                'description' => $request->uz_description,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
                'description' => $request->ru_description,
            ],

        ];


        $page->update($page_data);

        return redirect()->route('pages.show', $page->id)->with('success', __('main.update_msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('pages.index')->with('warning', __('main.delete_msg'));
    }
}
