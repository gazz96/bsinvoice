<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requeset)
    {
        $menus = Menu::orderBy('position', 'ASC')
            ->where('menu_parent', null)
            ->get();
            
        return view('menu.index', [
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.form', [
            'menu' => new Menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'menu_parent' => 'nullable',
            'icon' => 'required'
        ]);
        

        $menu = Menu::create($validated);
        
        return redirect(route('menu.index'))
            ->with('message', 'Berhasil menyimpan')
            ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.form', [
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'menu_parent' => 'nullable',
            'icon' => 'required'
        ]);
        
        $menu->update($validated);
        
        return redirect(route('menu.index'))
            ->with('message', 'Berhasil menyimpan')
            ->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()
            ->with('message', 'Berhasil menghapus')
            ->with('status', 'success');
    }

    public function sort()
    {
        $menus = Menu::all();
        $i = 1;
        foreach($menus as $menu)
        {
            $menu->update([
                'position' => $i++
            ]);
        }

        echo $i;
    }
}
