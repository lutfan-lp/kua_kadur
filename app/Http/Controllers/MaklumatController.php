<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maklumat;
use App\Models\KategoriMaklumat;

class MaklumatController extends Controller
{
    public function index()
    {
        $maklumat = Maklumat::with('kategori_maklumat')->paginate(10);
        return view('backend.content.maklumat.list', compact('maklumat'));
    }

    public function tambah()
    {
        $kategori_maklumat = KategoriMaklumat::all();
        return view('backend.content.maklumat.formTambah', compact('kategori_maklumat'));
    }

    public function prosesTambah(Request $request)
    {
        $request->validate ([
            'judul_maklumat' => 'required',
            'isi_maklumat' => 'required',
            'id_kategori_maklumat' => 'required',
            'gambar_maklumat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $maklumat = new Maklumat();
        $maklumat->judul_maklumat = $request->judul_maklumat;
        $maklumat->isi_maklumat = $request->isi_maklumat;
        $maklumat->id_kategori_maklumat = $request->id_kategori_maklumat;
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('gambar_maklumat')) {
            $gambarPath = $request->file('gambar_maklumat')->store('maklumat', 'public');
            $maklumat->gambar_maklumat = $gambarPath;
        } else {
            $maklumat->gambar_maklumat = 'default-image.jpg';
        }

        try {
            $maklumat->save();
            return redirect(route('maklumat.index'))->with('pesan', ['success','Berhasil tambah maklumat']);
        } catch (\Exception $e) {
            return redirect(route('maklumat.index'))->with('pesan', ['danger', 'Gagal tambah maklumat']);
        }
    }

    public function ubah($id)
    {
        $kategori_maklumat = KategoriMaklumat::all();
        $maklumats = Maklumat::findOrFail($id);
        return view('backend.content.maklumat.formUbah', compact('maklumats', 'kategori_maklumat'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate ([
            'judul_maklumat' => 'required',
            'isi_maklumat' => 'required',
            'id_kategori_maklumat' => 'required',
        ]);

        $maklumat = Maklumat::findOrFail($request->id_maklumat);
        $maklumat->judul_maklumat = $request->judul_maklumat;
        $maklumat->isi_maklumat = $request->isi_maklumat;
        $maklumat->id_kategori_maklumat = $request->id_kategori_maklumat;

        if($request->hasFile('gambar_maklumat')){
            $gambarPath = $request->file('gambar_maklumat')->store('maklumat', 'public');
            $maklumat->gambar_maklumat = $gambarPath;
        }

        try {
            $maklumat->save();
            return redirect(route('maklumat.index'))->with('pesan', ['success','Berhasil mengubah maklumat']);
        } catch (\Exception $e) {
            return redirect(route('maklumat.index'))->with('pesan', ['danger', 'Gagal mengubah maklumat']);
        }

    }

    public function hapus($id)
    {
        $maklumat = Maklumat::findOrFail($id);

        try {
            $maklumat->delete();
            return redirect(route('maklumat.index'))->with('pesan', ['success','Berhasil menghapus maklumat']);
        } catch (\Exception $e) {
            return redirect(route('maklumat.index'))->with('pesan', ['danger', 'Gagal menghapus maklumat']);
        }
    }
}
