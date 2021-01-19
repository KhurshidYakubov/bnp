<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Compound;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Khurshid Yakubov khurshid.yakubov@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.localetest.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('category_name', 'id');
        return view('admin.localetest.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => '',
            'category_id' => '',
            'img' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article_data = [
            'oz' => [
                'title' => $request->oz_title,
                'body' => $request->oz_body
            ],
            'uz' => [
                'title' => $request->uz_title,
                'body' => $request->uz_body
            ],
            'ru' => [
                'title' => $request->ru_title,
                'body' => $request->ru_body
            ],
        ];
        // dd($article_data);
        // Now just pass this array to regular Eloquent function and Voila!
        Post::create($article_data);

        // $article_data->save();

        //dd($article_data);
        // Redirect to the previous page successfully
        return redirect()->route('test.index');


//        $post->save();
//        return redirect()->route('test.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $category = Category::pluck('category_name', 'id');
        //dd($post->img);
        return view('admin.localetest.edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => '',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = time() . '.' . $extension;
            // Upload Image
            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/images/' . $post->img);

        }

        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->link = $request->link;
        $post->age = $request->age;
        $post->time = $request->time;
        if ($request->hasFile('img')) {
            $post->img = $fileNameToStore;
        }

        $post->save();
        return redirect()->route('test.index');
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
        return redirect()->route('test.index');
    }
}
