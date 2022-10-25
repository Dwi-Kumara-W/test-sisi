<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MenuManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $level = MenuLevel::all();

        return view('admin.menu.menuSetting.index', [
            'menu' => $menu,
            'level' => $level
        ]);
    }

    public function indexMenu()
    {
        return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Berhasil', 'Berhasil tambah menu');

        Menu::create([
            'id_level' => request('id_level'),
            'menu_name' => request('menu_name'),
            'menu_link' => request('menu_link'),
            'menu_icon' => request('menu_icon')->store('menuIcon')
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::delete($menu->image);
        }

        Alert::success('Berhasil', 'Berhasil ubah menu');

        $menu->update([
            'id_level' => request('id_level'),
            'menu_name' => request('menu_name'),
            'menu_link' => request('menu_link'),
            'menu_icon' => request('menu_icon')->store('menuIcon')
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // dd("Hello");
        $menu = Menu::findOrFail($id);

        $menu->delete();
        Alert::success('Success', 'Berhasil Dihapus');
        // Storage::delete($menu->image);

        return redirect('/menuManagement');
    }
}
