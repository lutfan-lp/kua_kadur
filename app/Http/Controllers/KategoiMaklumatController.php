<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriMaklumat;

class KategoiMaklumatController extends Controller
{
    public function index(){
        $kategori_maklumat = KategoriMaklumat::all();
        return view ('backend.content.kategoriMaklumat.list', compact('kategori_maklumat'));
    }

    public function tambah(){
        return view('backend.content.kategoriMaklumat.formTambah');
    }

    public function prosesTambah (Request $request){
        $request->validate ([
            'nama_kategori_maklumat' => 'required'
        ]);

        $kategori_maklumat = new KategoriMaklumat();
        $kategori_maklumat -> nama_kategori_maklumat = $request->nama_kategori_maklumat;

        try {
            $kategori_maklumat->save();
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['success', 'Berhasil ditambah kategori maklumat']);
        } catch (\Exception $e) {
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['danger', 'Gagal menambah kategori maklumat']);
        }
    }

    public function ubah($id){
        $kategori_maklumat = KategoriMaklumat::findOrFail($id);
        return view('backend.content.kategoriMaklumat.formUbah', compact('kategori_maklumat'));
    }

    public function prosesUbah(Request $request){
        $request->validate ([
            'id_kategori_maklumat' => 'required',
            'nama_kategori_maklumat' => 'required',
        ]);

        $kategori_maklumat = KategoriMaklumat::findOrFail($request->id_kategori_maklumat);
        $kategori_maklumat -> nama_kategori_maklumat = $request->nama_kategori_maklumat;

        try {
            $kategori_maklumat->save();
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['success', 'Berhasil mengubah kategori maklumat']);
        } catch (\Exception $e) {
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['danger', 'Gagal mengubah kategori maklumat']);
        }
    }

    public function hapus($id){
        $kategori_maklumat = KategoriMaklumat::findOrFail($id);

        try {
            $kategori_maklumat->delete();
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['success', 'Berhasil menghapus kategori maklumat']);
        } catch (\Exception $e) {
            return redirect(route('kategoriMaklumat.index'))->with('pesan', ['danger', 'Gagal menghapus kategori maklumat']);
        }
    }
}
