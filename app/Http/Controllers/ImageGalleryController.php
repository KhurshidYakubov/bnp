<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Khurshid Yakubov khurshid.yakubov@gmail.com
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::paginate(6);
        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = ImageGallery::all();
        return view('admin.gallery.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ImageGallery $image
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, ImageGallery $image)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => '',
            'anons_image' => '',
            'link' => '',
            'static' => ''
        ]);
        $data = [];
        if ($request->hasFile('image')) {

            foreach($request->file('image') as $file){
                $title = $request->title;
                $name = $file->getClientOriginalName();
               // $extension = $file->getClientOriginalExtension();
               // $fileNameToStore = $name . '.' . $extension;
                $path = $file->storeAs('public/images/gallery', $name);
                $data[] = $name;

            }

        }

        if ($request->hasFile('anons_image')) {
            $extension = $request->file('anons_image')->getClientOriginalExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('anons_image')->storeAs('public/images', $fileNameToStore);

            Storage::delete('public/images/' . $image->anons_image);

        }

        $image->title = $request->title;
        $image->image = json_encode($data);
        $image->anons_image = $fileNameToStore;
        $image->link = $request->link;
        $image->static  = $request->static;


//        dd($image);
        $image->save();


        return redirect()->route('photos.show' , $image->id)->with('success', __('main.create_msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = ImageGallery::findOrFail($id);
        return view('admin.gallery.show' ,compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = ImageGallery::findOrFail($id);
        return view('admin.gallery.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image = ImageGallery::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'image' => '',
            'anons_image' => '',
            'link' => '',
            'static' => ''
        ]);

        if ($request->hasFile('image')) {
             $data = [];

            foreach($request->file('image') as $file){
                $title = $request->title;
                $name = $file->getClientOriginalName();
                // $extension = $file->getClientOriginalExtension();
                // $fileNameToStore = $name . '.' . $extension;
                $path = $file->storeAs('public/images/gallery', $name);
                $data[] = $name;

            }

        }else{
            $data = $image->image;
        }

        if ($request->hasFile('anons_image')) {
            $extension = $request->file('anons_image')->getClientOriginalExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('anons_image')->storeAs('public/images', $fileNameToStore);

            Storage::delete('public/images/' . $image->anons_image);

        } else {
            $fileNameToStore = $image->anons_image;
        }


        $image->title = $request->title;
        $image->image = $data;
        $image->anons_image = $fileNameToStore;
        $image->link = $request->link;
        $image->static  = $request->static;
        $image->update();

        return redirect()->route('photos.show', $image->id)->with('success', __('main.update_msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ImageGallery::find($id)->delete();
        return back()->with('warning', __('main.delete_msg'));
    }
}
