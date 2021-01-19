<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'lang'])->group(function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class)->parameters([
        'posts' => 'post'
    ]);
    Route::resource('banners', App\Http\Controllers\BannerController::class)->parameters([
        'banners' => 'post'
    ]);
    Route::resource('merits', App\Http\Controllers\MeritController::class)->parameters([
        'merits' => 'post'
    ]);
    Route::resource('about', App\Http\Controllers\AboutController::class)->parameters([
        'about' => 'post'
    ]);
    Route::resource('programs', App\Http\Controllers\ProgramController::class)->parameters([
        'programs' => 'post'
    ]);
    Route::resource('teachers', App\Http\Controllers\TeacherController::class)->parameters([
        'teachers' => 'post'
    ]);
    Route::resource('activities', App\Http\Controllers\ActivityController::class)->parameters([
        'activities' => 'post'
    ]);
    Route::resource('socials', App\Http\Controllers\SocialController::class)->parameters([
        'socials' => 'post'
    ]);
    Route::resource('menus', App\Http\Controllers\MenuController::class);
    Route::resource('pages', App\Http\Controllers\PagesController::class);
    Route::resource('photos', App\Http\Controllers\ImageGalleryController::class);
    Route::resource('test', App\Http\Controllers\TestController::class);
    Route::post('/menu/getMenu', [App\Http\Controllers\MenuController::class, 'getMenu'])->name('getMenuitem');
});

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('front');
Route::get('/news', [App\Http\Controllers\PageController::class, 'allNews'])->name('allnews');
Route::get('/news/{id}', [App\Http\Controllers\PageController::class, 'showNews'])->name('shownews');
Route::get('/programs', [App\Http\Controllers\PageController::class, 'allPrograms'])->name('allprograms');
Route::get('/programs/{id}', [App\Http\Controllers\PageController::class, 'showPrograms'])->name('showprograms');
Route::get('/charity', [App\Http\Controllers\PageController::class, 'charity'])->name('charity');
Route::get('/gallery', [App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'pages'])->name('pages');
Route::get('tag/{name}', [App\Http\Controllers\PageController::class, 'tagSort'])->name('sorted_tag');
Route::get('/team', [App\Http\Controllers\PageController::class, 'allMembers'])->name('allmembers');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("{locale}", function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::post('ckeditor/upload', [App\Http\Controllers\CkeditorController::class, 'upload'])->name('ckeditor.upload');
