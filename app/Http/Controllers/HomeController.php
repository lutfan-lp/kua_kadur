<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Berita;
use App\Models\Page;
use App\Models\Profile;
use App\Models\Maklumat;
use App\Models\KategoriMaklumat;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        $menu = $this->getMenu();
        $berita = Berita::with('kategori')->latest()->get()->take(6);
        $mostViews = Berita::with('kategori')->orderByDesc('total_views')->get()->take(3);
        return view('frontend.content.beranda', compact('menu', 'berita', 'mostViews'));
    }

    public function berita()
    {
        $menu = $this->getMenu();
        $berita = Berita::with('kategori')->latest()->get()->take(6);
        $mostViews = Berita::with('kategori')->orderByDesc('total_views')->get()->take(3);
        return view('frontend.content.berita', compact('menu', 'berita', 'mostViews'));
    }

    public function semuaBerita()
    {
        $menu = $this->getMenu();
        $berita = Berita::with('kategori')->latest()->get();
        return view('frontend.content.semuaBerita', compact('menu', 'berita'));
    }

    public function detailBerita($id)
    {
        $menu = $this->getMenu();
        $berita = Berita::findOrFail($id);

        #update total_view
        $berita->total_views = $berita->total_views + 1;
        $berita->save();
        return view('frontend.content.detailBerita', compact('menu', 'berita'));
    }

    public function profile()
    {
        // $menu = $this->getMenu();
        $profile = Profile::first();
        return view('frontend.content.profile', compact('profile'));
    }

    public function maklumat()
    {
        $kategori_maklumat = KategoriMaklumat::all();
        $maklumats = Maklumat::latest()->get();

        // Kelompokkan maklumat per kategori
        $groupedMaklumats = $maklumats->groupBy('id_kategori_maklumat');

        return view('frontend.content.maklumat', compact('kategori_maklumat', 'maklumats', 'groupedMaklumats'));
    }

    public function detailMaklumat($id)
    {
        $maklumats = Maklumat::findOrFail($id);
        return view('frontend.content.detailMaklumat', compact('maklumats'));
    }

    public function detailPage($id)
    {
        $menu = $this->getMenu();
        $page = Page::findOrFail($id);
        return view('frontend.content.detailPage', compact('menu', 'page'));
    }

    public function layanan()
    {
        $layanan = Layanan::latest()->get();
        return view('frontend.content.layanan', compact('layanan'));
    }

    public function detailLayanan($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('frontend.content.detailLayanan', compact('layanan'));
    }

    private function getMenu()
    {
        $menu = Menu::whereNull('parent_menu')
        ->with(['submenu' => fn($q) => $q->where('status_menu', '=', 1)->orderBy('urutan_menu', 'asc')])
        ->where('status_menu', '=', 1)
        ->orderBy('urutan_menu', 'asc')
        ->get();

        $dataMenu = [];
        foreach ($menu as $m) {
            $jenis_menu = $m->jenis_menu;
            $urlMenu = "";

            if($jenis_menu == "url") {
                $urlMenu = $m->url_menu;
            } else {
                $urlMenu = route('home.detailPage', $m->url_menu);
            }

            #item menu
            $dItemMenu = [];
            foreach ($m->submenu as $im) {
                $jenisItemMenu = $im->jenis_menu;
                $urlItemMenu = "";

                if($jenisItemMenu == "url") {
                    $urlItemMenu = $im->url_menu;
                } else {
                    $urlItemMenu = route('home.detailPage', $im->url_menu);
                }

                $dItemMenu[] = [
                    'sub_menu_nama' => $im->nama_menu,
                    'sub_menu_target' => $im->target_menu,
                    'sub_menu_url' => $urlItemMenu,
                ];
            }

            $dataMenu[] = [
                'menu' => $m->nama_menu,
                'target' => $m->target_menu,
                'url' => $urlMenu,
                'itemMenu' => $dItemMenu
            ];
        }

        return $dataMenu;
    }
}
