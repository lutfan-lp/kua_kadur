<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->paginate(10);
        return view('backend.content.berita.list', compact('berita'));
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('backend.content.berita.formTambah', compact('kategori'));
    }

    public function prosesTambah(Request $request)
    {
        $request->validate ([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'id_kategori' => 'required',
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $request->file('gambar_berita')->store('public');
        // $gambar_berita = $request->file('gambar_berita')->hashName();
        $gambarPath = $request->file('gambar_berita')->store('berita', 'public');

        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->id_kategori = $request->id_kategori;
        $berita->gambar_berita = $gambarPath;

        try {
            $berita->save();
            return redirect(route('berita.index'))->with('pesan', ['success','Berhasil tambah berita']);
        } catch (\Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal tambah berita']);
        }
    }

    public function ubah($id)
    {
        $kategori = Kategori::all();
        $berita = Berita::findOrFail($id);
        return view('backend.content.berita.formUbah', compact('berita', 'kategori'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate ([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'id_kategori' => 'required',
        ]);

        $berita = Berita::findOrFail($request->id_berita);
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->id_kategori = $request->id_kategori;

        if($request->hasFile('gambar_berita')){
            $gambarPath = $request->file('gambar_berita')->store('berita', 'public');
            $berita->gambar_berita = $gambarPath;
        }

        try {
            $berita->save();
            return redirect(route('berita.index'))->with('pesan', ['success','Berhasil mengubah berita']);
        } catch (\Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal mengubah berita']);
        }

    }

    public function hapus($id)
    {
        $berita = Berita::findOrFail($id);

        try {
            $berita->delete();
            return redirect(route('berita.index'))->with('pesan', ['success','Berhasil menghapus berita']);
        } catch (\Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal menghapus berita']);
        }
    }

}
