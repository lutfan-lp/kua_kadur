<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function index(){
        $profile = Profile::all();
        return view('backend.content.profile.profile', compact('profile'));
    }

    public function ubah($id){
        // $profile = profile::all();
        $profile = Profile::findOrFail($id);
        return view('backend.content.profile.formUbah', compact('profile'));
    }

    public function prosesUbah(Request $request){
        $request->validate ([
            'judul_profile' => 'required',
            'isi_profile' => 'required',
            // 'gambar_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $gambarPath = $request->file('gambar_profile')->store('profile', 'public');

        $profile = Profile::findOrFail($request->id_profile);
        $profile->judul_profile = $request->judul_profile;
        $profile -> isi_profile = $request->isi_profile;

        if($request->hasFile('gambar_profile')){
            $gambarPath = $request->file('gambar_profile')->store('profile', 'public');
            $profile->gambar_profile = $gambarPath;
        }

        try {
            $profile->save();
            return redirect(route('profile.index'))->with('pesan', ['success', 'Berhasil mengubah profile']);
        } catch (\Excaption $e) {
            return redirect(route('profile.index'))->with('pesan', ['danger', 'Gagal mengubah profile']);
        }

    }
}
