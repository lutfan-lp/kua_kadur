<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::whereNull('parent_menu')
        ->with(['submenu'=> fn($q) => $q ->orderBy('urutan_menu', 'asc')])
        ->orderBy('urutan_menu', 'asc')
        ->get();

        return view('backend.content.menu.list', compact('menu'));
    }

    public function order($idMenu, $idSwap){
        $menu = Menu::findOrFail($idMenu);
        $menuOrder = $menu->urutan_menu;

        $swap = Menu::findOrFail($idSwap);
        $swapOrder = $swap->urutan_menu;

        $menu->urutan_menu = $swapOrder;
        $swap->urutan_menu = $menuOrder;

        try {
            $menu->save();
            $swap->save();
            return redirect(route('menu.index'))->with('pesan',['success', 'Berhasil mengubah urutan menu']);
        } catch (\Throwable $th) {
            return redirect(route('menu.index'))->with('pesan',['danger', 'Gagal mengubah urutan menu']);
        }
    }

    public function hapus($id){
        $menu = Menu::findOrFail($id);

        try {
            $menu->delete();
            return redirect(route('menu.index'))->with('pesan',['success', 'Berhasil menghapus menu']);
        } catch (\Throwable $th) {
            return redirect(route('menu.index'))->with('pesan',['danger', 'Gagal menghapus menu']);
        }
    }

    public function ubah($id){
        $page = Page::where('status_page', '=', 1)->get();
        $parent = Menu::whereNull('parent_menu')->where('status_menu', '=', 1)->get();
        $menu = Menu::findOrFail($id);
        return view('backend.content.menu.formUbah', compact('page', 'parent', 'menu'));
    }

    public function prosesUbah(Request $request){
        // $this->validate($request,[
            $request->validate([
            'id_menu' => 'required',
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'target_menu' => 'required',
        ]);

        $url_menu = "";
        if($request->jenis_menu == "url"){
            $url_menu = $request->link_url;
        }else{
            $url_menu = $request->link_page;
        }

        $menu = Menu::findOrFail($request->id_menu);
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis_menu = $request->jenis_menu;
        $menu->url_menu = $url_menu;
        $menu->target_menu = $request->target_menu;
        $menu->parent_menu = $request->parent_menu;
        $menu->status_menu = $request->status_menu;

        try {
            $menu->save();
            return redirect(route('menu.index'))->with('pesan',['success', 'Berhasil mengubah menu']);
        } catch (\Throwable $th) {
            return redirect(route('menu.index'))->with('pesan',['danger', 'Gagal mengubah menu']);
        }
    }

    public function tambah(){
        $page = Page::where('status_page', '=', 1)->get();
        $parent = Menu::whereNull('parent_menu')->where('status_menu', '=', 1)->get();

        return view('backend.content.menu.formTambah', compact('page', 'parent'));
    }

    // public function prosesTambah(Request $request){
    //     $validated = $request->validate([
    //         'nama_menu' => 'required',
    //         'jenis_menu' => 'required',
    //         'target_menu' => 'required',
    //     ]);

    //     $parent_menu = $request->parent_menu;
    //     if($parent_menu == null){
    //         $urut = $this->getUrutMenu();
    //     }else{
    //         $urut = $this->getUrutMenu($parent_menu);
    //     }

    //     $url_menu = "";
    //     if($request->jenis_menu == "url"){
    //         $url_menu = $request->link_url;
    //     }else{
    //         $url_menu = $request->link_page;
    //     }

    //     $menu = new Menu();
    //     $menu->nama_menu = $request->nama_menu;
    //     $menu->jenis_menu = $request->jenis_menu;
    //     $menu->url_menu = $url_menu;
    //     $menu->target_menu = $request->target_menu;
    //     $menu->urutan_menu = $urut;
    //     $menu->parent_menu = $parent_menu;

    //     try {
    //         $menu->save();
    //         return redirect(route('menu.index'))->with('pesan',['success', 'Berhasil  menambah menu']);
    //     } catch (\Throwable $th) {
    //         return redirect(route('menu.index'))->with('pesan',['danger', 'Gagal menambah menu']);
    //     }
    // }

    // private function getUrutMenu($parent = null){
    //     if($parent == null){
    //         #Menu
    //         $noUrutMenu = null;
    //         $urut = Menu::select('urutan_menu')->whereNull('parent_menu')->orderBy('urutan_menu', 'desc')->first();
    //         if($urut == null){
    //             $noUrutMenu = 1;
    //         }else{
    //             $noUrutMenu = $urut->urutan_menu + 1;
    //         }

    //         return $noUrutMenu;
    //     }else{
    //         #Sub Menu
    //         $noUrutSubMenu = null;
    //         $urutSubMenu = Menu::select('urutan_menu')->whereNotNull('parent_menu')->where('parent_menu', '=', $parent)->orderBy('urutan_menu', 'desc')->first();
    //         if($urutSubMenu == null){
    //             $noUrutSubMenu = 1;
    //         }else{
    //             $noUrutSubMenu = $urutSubMenu->urutan_menu + 1;
    //         }

    //         return $noUrutSubMenu;
    //     }
    // }

    public function prosesTambah(Request $request)
    {
        // Validasi awal
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis_menu' => 'required|in:url,page',
            'target_menu' => 'required',
            'link_url' => 'required_if:jenis_menu,url|nullable|url',
            'link_page' => 'required_if:jenis_menu,page|nullable|string',
            'parent_menu' => 'nullable|exists:menu,id_menu',
        ]);

        $parent_menu = $request->input('parent_menu');
        $urut = $this->getUrutMenu($parent_menu);

        // Ambil url menu berdasarkan jenis_menu
        $url_menu = $request->jenis_menu === 'url'
            ? $request->link_url
            : $request->link_page;

        // Simpan ke database
        try {
            Menu::create([
                'nama_menu' => $request->nama_menu,
                'jenis_menu' => $request->jenis_menu,
                'url_menu' => $url_menu,
                'target_menu' => $request->target_menu,
                'urutan_menu' => $urut,
                'parent_menu' => $parent_menu,
            ]);

            return redirect(route('menu.index'))->with('pesan', ['success', 'Berhasil menambah menu']);
        } catch (\Throwable $th) {
            \Log::error('Gagal menambah menu: ' . $th->getMessage());
            return redirect(route('menu.index'))->with('pesan', ['danger', 'Gagal menambah menu']);
        }
    }

    private function getUrutMenu($parent = null)
    {
        if (is_null($parent)) {
            // Menu induk
            $last = Menu::whereNull('parent_menu')
                ->orderByDesc('urutan_menu')
                ->value('urutan_menu');

            return $last ? $last + 1 : 1;
        } else {
            // Submenu
            $last = Menu::where('parent_menu', $parent)
                ->orderByDesc('urutan_menu')
                ->value('urutan_menu');

            return $last ? $last + 1 : 1;
        }
    }

}
