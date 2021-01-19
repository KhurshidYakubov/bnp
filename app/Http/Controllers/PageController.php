<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['lang']);
    }

    public function index()
    {
        $banner = Post::all()->where('category_id', 1);
        $about = Post::latest()->where('category_id', 2)->take(1)->get();
        $programs = Post::latest()->where('category_id', 3)->take(3)->get();
        $activities = Post::latest()->where('category_id', 4)->take(1)->get();
        $teachers = Post::where('category_id', 5)->orderBy('link')->take(4)->get();
        $news = Post::latest()->where('category_id', 6)->take(2)->get();
        $afzals = Post::latest()->where('category_id', 7)->take(6)->get();
        $socials = Post::where('category_id', 8)->take(5)->get();
        $images = ImageGallery::latest()->take(6)->get();
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
//        foreach ($tree as $menu) {
//
//            foreach ($menu['translations'] as $tr) {
//                if ($tr['locale'] == \app()->getLocale()) {
//                    dd($tr['name']);
//                }
//            }
//
//            if (isset($menu['children'])) {
//                foreach ($menu['children'] as $item) {
//                    if ($item['translations'] == \app()->getLocale()) {
////                        dd($item['name']);
//                    }
//                }
//            }
//        }
//        dd(\app()->getLocale());
        return view('front.index', compact('banner',
            'about',
            'programs',
            'activities',
            'teachers',
            'news',
            'afzals',
            'images',
            'tree',
            'socials'));
    }

    public function allNews()
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $news = Post::latest()->where('category_id', 6)->paginate(6);

        return view('front.all-news', compact('tree', 'socials', 'news'));
    }

    public function showNews($id)
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $post = Post::findOrFail($id);
        $sidebar_news = Post::latest()->where('category_id', 6)->take(2)->get();
        $popular_tags = Tag::orderBy('id', 'desc')->where('count', '>', 0)->take(6)->get();

        return view('front.show-news', compact('post', 'tree', 'socials', 'sidebar_news', 'popular_tags'));
    }

    public function allprograms()
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $programs = Post::latest()->where('category_id', 3)->take(3)->paginate(6);

        return view('front.all-programs', compact('tree', 'socials', 'programs'));
    }

    public function showPrograms($id)
    {
        $post = Post::findOrFail($id);
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $programs_in = Post::latest()->where('category_id', 3)->take(3)->get();

        return view('front.show-programs', compact('post', 'tree', 'socials', 'programs_in'));
    }


    public function charity()
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();

        return view('front.charity', compact('tree', 'socials'));

    }

    public function gallery()
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $media = ImageGallery::latest()->take(6)->paginate(6);

        return view('front.gallery', compact('tree', 'socials', 'media'));
    }

    public  function pages($slug){

        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $page = Page::where('slug', $slug)->first();
//        dd($page->translation['title']);
        return view('front.page', compact('tree', 'socials', 'page'));
    }

    public function tagSort($name){

        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $news = Post::withAnyTag([$name])->paginate(1);

        return view('front.all-news', compact('tree', 'socials', 'news'));
    }

    public function allMembers()
    {
        $menus = Menu::orderBy('order')->get();
        $tree = Menu::buildTree($menus->toArray());
        $socials = Post::where('category_id', 8)->take(5)->get();
        $team_members = Post::where('category_id', 5)->orderBy('link')->paginate(6);

        return view('front.all-members', compact('tree', 'socials', 'team_members'));
    }


}
