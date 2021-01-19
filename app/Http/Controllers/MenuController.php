<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuTranslation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @author Khurshid Yakubov khurshid.yakubov@gmail.com
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_filter = $request->id_filter;
        $type_filter = $request->type_filter;
        $name_filter = $request->name_filter;
        $menus = Menu::with('submenus')->paginate(6);
        $main_menu = Menu::all()->where('parent_id', null);

        if ($id_filter) {
            $menus = Menu::all()->where('id', $id_filter);
        } elseif ($type_filter) {
            $menus = Menu::all()->where('parent_id', $type_filter);
        } elseif ($name_filter) {
            $menus = Menu::whereHas('menuTranslation', function (Builder $query) use ($name_filter) {
                $query->where('name', 'like', '%' . $name_filter . '%');
            })->get();
        }
        return view('admin.menus.index', compact('menus', 'id_filter', 'type_filter', 'main_menu', 'name_filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $main_menu = Menu::all()->where('parent_id', null);
        return view('admin.menus.create', compact('main_menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => '',
            'link' => '',
            'oder' => '',
        ]);


        $menu_data = [
            'oz' => [
                'name' => $request->oz_name,
            ],
            'uz' => [
                'name' => $request->uz_name,
            ],
            'ru' => [
                'name' => $request->ru_name,
            ],
            'parent_id' => $request->mainmenu,
            'order' => $request->order,
            'link' => $request->link,
        ];

//        dd($menu_data);

        $model = Menu::create($menu_data);
        return redirect()->route('menus.show', $model->id)->with('success', __('main.create_msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_view = Menu::findORFail($id);
        return view('admin.menus.show', compact('menu_view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $main_menu = Menu::all()->where('parent_id', null);
        return view('admin.menus.edit', compact('main_menu', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => '',
        ]);


        $menu_data = [
            'oz' => [
                'name' => $request->oz_name,
            ],
            'uz' => [
                'name' => $request->uz_name,
            ],
            'ru' => [
                'name' => $request->ru_name,
            ],
            'parent_id' => $request->mainmenu,
            'order' => $request->order,
            'link' => $request->link,
        ];

        $menu->update($menu_data);
        return redirect()->route('menus.show', $menu->id)->with('success', __('main.update_msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menus.index')->with('warning', __('main.delete_msg'));
    }

    /*
  AJAX request
  */
    public function getMenu(Request $request)
    {

        $search = $request->search;
        if ($search == '') {
            $employees = MenuTranslation::where('locale', app()->getLocale())->orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $employees = MenuTranslation::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }

        echo json_encode($response);
        exit;
    }
}
