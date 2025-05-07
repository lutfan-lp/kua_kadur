<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\BagianLayanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::with('bagian_layanan')->paginate(10);
        return view('backend.content.layanan.list', compact('layanan'));
    }

    public function tambah()
    {
        $bagian_layanan = BagianLayanan::all();
        return view('backend.content.layanan.formTambah', compact('bagian_layanan'));
    }

    public function prosesTambah(Request $request)
    {
        $request->validate ([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'id_bagian_layanan' => 'required',
            'gambar_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = new Layanan();
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->deskripsi_layanan = $request->deskripsi_layanan;
        $layanan->id_bagian_layanan = $request->id_bagian_layanan;
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('gambar_layanan')) {
            $gambarPath = $request->file('gambar_layanan')->store('layanan', 'public');
            $layanan->gambar_layanan = $gambarPath;
        } else {
            $layanan->gambar_layanan = 'default-image.jpg';
        }

        try {
            $layanan->save();
            return redirect(route('layanan.index'))->with('pesan', ['success','Berhasil menambah layanan']);
        } catch (\Exception $e) {
            return redirect(route('layanan.index'))->with('pesan', ['danger', 'Gagal menambah layanan']);
        }
    }

    public function ubah($id)
    {
        $bagian_layanan = BagianLayanan::all();
        $layanan = Layanan::findOrFail($id);
        return view('backend.content.layanan.formUbah', compact('layanan', 'bagian_layanan'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate ([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'id_bagian_layanan' => 'required',
        ]);

        $layanan = Layanan::findOrFail($request->id_layanan);
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->deskripsi_layanan = $request->deskripsi_layanan;
        $layanan->id_bagian_layanan = $request->id_bagian_layanan;

        if($request->hasFile('gambar_layanan')){
            $gambarPath = $request->file('gambar_layanan')->store('layanan', 'public');
            $layanan->gambar_layanan = $gambarPath;
        }

        try {
            $layanan->save();
            return redirect(route('layanan.index'))->with('pesan', ['success','Berhasil mengubah layanan']);
        } catch (\Exception $e) {
            return redirect(route('layanan.index'))->with('pesan', ['danger', 'Gagal mengubah layanan']);
        }

    }

    public function hapus($id)
    {
        $layanan = Layanan::findOrFail($id);

        try {
            $layanan->delete();
            return redirect(route('layanan.index'))->with('pesan', ['success','Berhasil menghapus layanan']);
        } catch (\Exception $e) {
            return redirect(route('layanan.index'))->with('pesan', ['danger', 'Gagal menghapus layanan']);
        }
    }
}
