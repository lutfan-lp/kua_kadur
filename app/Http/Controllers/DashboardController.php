<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index(){
        $totalBerita = Berita::count();
        $totalKategori = Kategori::count();

        $latestBerita = Berita::with('kategori')->latest()->take(5)->get();
        return view('backend.content.dashboard', compact('totalBerita', 'totalKategori', 'latestBerita'));
    }

    public function resetPassword(){
        return view('backend.content.resetPassword');
    }
}
