<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalKategori = Kategori::count();

        $latestBerita = Berita::with('kategori')->latest()->take(5)->get();
        return view('backend.content.dashboard', compact('totalBerita', 'totalKategori', 'latestBerita'));
    }

    public function resetPassword()
    {
        return view('backend.content.resetPassword');
    }

    public function prosesResetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'c_new_password' => 'required_with:new_password|same:new_password|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        $id = Auth::guard('user')->user()->id;
        $user = User::findOrFail($id);

        if(Hash::check($old_password, $user->password)) {
            $user->password = bcrypt($new_password);

            try {
                $user->save();
                return redirect(route('dashboard.resetPassword'))->with('pesan', ['success', 'Selamat anda berhasih reset password']);
            } catch (\Exception $th) {
                return redirect(route('dashboard.resetPassword'))->with('pesan', ['danger', 'Anda gagal reset password']);
            }
        } else {
            return redirect(route('dashboard.resetPassword'))->with('pesan', ['danger', 'Password lama anda salah']);
        }
    }
}
