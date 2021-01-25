<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @author Khurshid Yakubov khurshid.yakubov@gmail.com
     */
    public function index(Request $request)
    {
        $id_filter = $request->id_filter;
        $type_filter = $request->type_filter;
        $name_filter = $request->name_filter;
        $posts = Post::with('category')->where('category_id', 6)->paginate(6);
        if ($id_filter) {
            $posts = Post::all()->where('id', $id_filter);
        } elseif ($name_filter) {
            $posts = Post::whereHas('postTranslation', function (Builder $query) use ($name_filter) {
                $query->where('title', 'like', '%' . $name_filter . '%');
            })->get();
        } elseif ($type_filter) {
            $posts = Post::all()->where('category_id', $type_filter);
        }

        return view('admin.posts.index', compact('posts', 'id_filter', 'name_filter', 'type_filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('category_name', 'id');
        return view('admin.posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => '',
            'category_id' => '',
            'img' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('img')) {

            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);

        }

        $cat_id = Category::find(6);

        $post_data = [
            'en' => [
                'title' => $request->en_title,
                'body' => $request->en_body,
                'short_desc' => $request->en_short_desc,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
                'short_desc' => $request->uz_short_desc,
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
                'short_desc' => $request->ru_short_desc,
            ],
            'category_id' => $cat_id->id,
            'link' => $request->link,
            'time' => $request->time,
            'img' => $fileNameToStore,
        ];

        $tags = explode(",", $request->tags);

        $model = Post::create($post_data);
        $model->tag($tags);

        return redirect()->route('posts.show', $model->id)->with('success', __('main.create_msg'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function show($id)
    {
        $post_view = Post::findOrFail($id);

        return view('admin.posts.show', compact('post_view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::all()->pluck('category_name', 'id');
//            dd($post->tag_names);
        return view('admin.posts.edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => '',
            'category_id' => '',
            'img' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);

            Storage::delete('public/images/' . $post->img);

        } else {
            $fileNameToStore = $post->img;
        }
        $cat_id = Category::find(6);

        $post_data = [
            'en' => [
                'title' => $request->en_title,
                'body' => $request->en_body,
                'short_desc' => $request->en_short_desc,
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body,
                'short_desc' => $request->uz_short_desc,

            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body,
                'short_desc' => $request->ru_short_desc,
            ],
            'category_id' => $cat_id->id,
            'definition' => $request->definition,
            'link' => $request->link,
            'time' => $request->time,
            'img' => $fileNameToStore,
        ];

        $tags = explode(",", $request->tags);
        $post->untag();
        $post->update($post_data);
        $post->tag($tags);

        return redirect()->route('posts.show', $post->id)->with('success', __('main.update_msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('warning', __('main.delete_msg'));
    }
}
