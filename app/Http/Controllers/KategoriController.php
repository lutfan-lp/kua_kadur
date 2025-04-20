<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Auth;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view ('backend.content.kategori.list', compact('kategori'));
    }

    public function tambah(){
        return view('backend.content.kategori.formTambah');
    }

    public function prosesTambah (Request $request){
        $request->validate ([
            'nama_kategori' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori -> nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil ditambah kategori']);
        } catch (\Excaption $e) {
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal menambah kategori']);
        }
    }

    public function ubah($id){
        $kategori = Kategori::findOrFail($id);
        return view('backend.content.kategori.formUbah', compact('kategori'));
    }

    public function prosesUbah(Request $request){
        $request->validate ([
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori -> nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil mengubah kategori']);
        } catch (\Excaption $e) {
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal mengubah kategori']);
        }
    }

    public function hapus($id){
        $kategori = Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil menghapus kategori']);
        } catch (\Excaption $e) {
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal menghapus kategori']);
        }
    }
}
