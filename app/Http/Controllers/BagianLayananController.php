<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BagianLayanan;

class BagianLayananController extends Controller
{
    public function index()
    {
        $bagian_layanan = BagianLayanan::all();
        return view ('backend.content.bagianLayanan.list', compact('bagian_layanan'));
    }

    public function tambah()
    {
        return view('backend.content.bagianLayanan.formTambah');
    }

    public function prosesTambah (Request $request)
    {
        $request->validate ([
            'nama_bagian_layanan' => 'required',
            'koordinator_bagian' => 'required',
            'kontak' => 'required',
        ]);

        $bagian_layanan = new BagianLayanan();
        $bagian_layanan -> nama_bagian_layanan = $request->nama_bagian_layanan;
        $bagian_layanan -> koordinator_bagian = $request->koordinator_bagian;
        $bagian_layanan -> kontak = $request->kontak;

        try {
            $bagian_layanan->save();
            return redirect(route('bagianLayanan.index'))->with('pesan', ['success', 'Berhasil menambah bagian layanan']);
        } catch (\Excaption $e) {
            return redirect(route('bagianLayanan.index'))->with('pesan', ['danger', 'Gagal menambah bagian layanan']);
        }
    }

    public function ubah($id)
    {
        $bagian_layanan = BagianLayanan::findOrFail($id);
        return view('backend.content.bagianLayanan.formUbah', compact('bagian_layanan'));
    }

    public function prosesUbah(Request $request)
    {
        $request->validate ([
            'id_bagian_layanan' => 'required',
            'nama_bagian_layanan' => 'required',
            'koordinator_bagian' => 'required',
            'kontak' => 'required',
        ]);

        $bagian_layanan = BagianLayanan::findOrFail($request->id_bagian_layanan);
        $bagian_layanan -> nama_bagian_layanan = $request->nama_bagian_layanan;
        $bagian_layanan -> koordinator_bagian = $request->koordinator_bagian;
        $bagian_layanan -> kontak = $request->kontak;

        try {
            $bagian_layanan->save();
            return redirect(route('bagianLayanan.index'))->with('pesan', ['success', 'Berhasil mengubah bagian layanan']);
        } catch (\Excaption $e) {
            return redirect(route('bagianLayanan.index'))->with('pesan', ['danger', 'Gagal mengubah bagian layanan']);
        }
    }

    public function hapus($id)
    {
        $bagian_layanan = BagianLayanan::findOrFail($id);

        try {
            $bagian_layanan->delete();
            return redirect(route('bagianLayanan.index'))->with('pesan', ['success', 'Berhasil menghapus bagian layanan']);
        } catch (\Excaption $e) {
            return redirect(route('bagianLayanan.index'))->with('pesan', ['danger', 'Gagal menghapus bagian layanan']);
        }
    }
}
