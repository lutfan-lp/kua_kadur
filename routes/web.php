<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('beranda');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/berita', [App\Http\Controllers\HomeController::class, 'berita'])->name('home.berita');
Route::get('/berita/{id}', [App\Http\Controllers\HomeController::class, 'detailBerita'])->name('home.detailBerita');
Route::get('/semuaBerita', [App\Http\Controllers\HomeController::class, 'semuaBerita'])->name('home.semuaBerita');
Route::get('/layanan', [App\Http\Controllers\HomeController::class, 'layanan'])->name('home.layanan');
Route::get('/layanan/{id}', [App\Http\Controllers\HomeController::class, 'detailLayanan'])->name('home.detailLayanan');
Route::get('/maklumat', [App\Http\Controllers\HomeController::class, 'maklumat'])->name('home.maklumat');
Route::get('/maklumat/{id}', [App\Http\Controllers\HomeController::class, 'detailMaklumat'])->name('home.detailMaklumat');
Route::get('/page/{id}', [App\Http\Controllers\HomeController::class, 'detailPage'])->name('home.detailPage');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('home.profile');

Route::get('/login',[App\Http\Controllers\AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware'=>'auth:user'], function() {
// Route::middleware('auth:user')->group(function() {
    Route::prefix('admin') -> group(function() {
        Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('/reset-password',[App\Http\Controllers\DashboardController::class, 'resetPassword'])->name('dashboard.resetPassword');
        Route::post('/reset-password',[App\Http\Controllers\DashboardController::class, 'prosesResetPassword'])->name('dashboard.prosesResetPassword');

        Route::get('/bagianLayanan', [App\Http\Controllers\BagianLayananController::class, 'index'])->name('bagianLayanan.index');
        Route::get('/bagianLayanan/tambah', [App\Http\Controllers\BagianLayananController::class, 'tambah'])->name('bagianLayanan.tambah');
        Route::post('/bagianLayanan/prosesTambah', [App\Http\Controllers\BagianLayananController::class, 'prosesTambah'])->name('bagianLayanan.prosesTambah');
        Route::get('/bagianLayanan/ubah/{id}', [App\Http\Controllers\BagianLayananController::class, 'ubah'])->name('bagianLayanan.ubah');
        Route::post('/bagianLayanan/prosesUbah', [App\Http\Controllers\BagianLayananController::class, 'prosesUbah'])->name('bagianLayanan.prosesUbah');
        Route::get('/bagianLayanan/hapus/{id}', [App\Http\Controllers\BagianLayananController::class, 'hapus'])->name('bagianLayanan.hapus');

        Route::get('/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('layanan.index');
        Route::get('/layanan/tambah', [App\Http\Controllers\LayananController::class, 'tambah'])->name('layanan.tambah');
        Route::post('/layanan/prosesTambah', [App\Http\Controllers\LayananController::class, 'prosesTambah'])->name('layanan.prosesTambah');
        Route::get('/layanan/ubah/{id}', [App\Http\Controllers\LayananController::class, 'ubah'])->name('layanan.ubah');
        Route::post('/layanan/prosesUbah', [App\Http\Controllers\LayananController::class, 'prosesUbah'])->name('layanan.prosesUbah');
        Route::get('/layanan/hapus/{id}', [App\Http\Controllers\LayananController::class, 'hapus'])->name('layanan.hapus');

        Route::get('/kategoriMaklumat', [App\Http\Controllers\KategoiMaklumatController::class, 'index'])->name('kategoriMaklumat.index');
        Route::get('/kategoriMaklumat/tambah', [App\Http\Controllers\KategoiMaklumatController::class, 'tambah'])->name('kategoriMaklumat.tambah');
        Route::post('/kategoriMaklumat/prosesTambah', [App\Http\Controllers\KategoiMaklumatController::class, 'prosesTambah'])->name('kategoriMaklumat.prosesTambah');
        Route::get('/kategoriMaklumat/ubah/{id}', [App\Http\Controllers\KategoiMaklumatController::class, 'ubah'])->name('kategoriMaklumat.ubah');
        Route::post('/kategoriMaklumat/prosesUbah', [App\Http\Controllers\KategoiMaklumatController::class, 'prosesUbah'])->name('kategoriMaklumat.prosesUbah');
        Route::get('/kategoriMaklumat/hapus/{id}', [App\Http\Controllers\KategoiMaklumatController::class, 'hapus'])->name('kategoriMaklumat.hapus');

        Route::get('/maklumat', [App\Http\Controllers\MaklumatController::class, 'index'])->name('maklumat.index');
        Route::get('/maklumat/tambah', [App\Http\Controllers\MaklumatController::class, 'tambah'])->name('maklumat.tambah');
        Route::post('/maklumat/prosesTambah', [App\Http\Controllers\MaklumatController::class, 'prosesTambah'])->name('maklumat.prosesTambah');
        Route::get('/maklumat/ubah/{id}', [App\Http\Controllers\MaklumatController::class, 'ubah'])->name('maklumat.ubah');
        Route::post('/maklumat/prosesUbah', [App\Http\Controllers\MaklumatController::class, 'prosesUbah'])->name('maklumat.prosesUbah');
        Route::get('/maklumat/hapus/{id}', [App\Http\Controllers\MaklumatController::class, 'hapus'])->name('maklumat.hapus');

        Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('kategori.tambah');
        Route::post('/kategori/prosesTambah', [App\Http\Controllers\KategoriController::class, 'prosesTambah'])->name('kategori.prosesTambah');
        Route::get('/kategori/ubah/{id}', [App\Http\Controllers\KategoriController::class, 'ubah'])->name('kategori.ubah');
        Route::post('/kategori/prosesUbah', [App\Http\Controllers\KategoriController::class, 'prosesUbah'])->name('kategori.prosesUbah');
        Route::get('/kategori/hapus/{id}', [App\Http\Controllers\KategoriController::class, 'hapus'])->name('kategori.hapus');

        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/ubah/{id}', [App\Http\Controllers\ProfileController::class, 'ubah'])->name('profile.ubah');
        Route::post('/profile/prosesUbah', [App\Http\Controllers\ProfileController::class, 'prosesUbah'])->name('profile.prosesUbah');

        Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
        Route::get('/berita/tambah', [App\Http\Controllers\BeritaController::class, 'tambah'])->name('berita.tambah');
        Route::post('/berita/prosesTambah', [App\Http\Controllers\BeritaController::class, 'prosesTambah'])->name('berita.prosesTambah');
        Route::get('/berita/ubah/{id}', [App\Http\Controllers\BeritaController::class, 'ubah'])->name('berita.ubah');
        Route::post('/berita/prosesUbah', [App\Http\Controllers\BeritaController::class, 'prosesUbah'])->name('berita.prosesUbah');
        Route::get('/berita/hapus/{id}', [App\Http\Controllers\BeritaController::class, 'hapus'])->name('berita.hapus');

        Route::get('/page', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
        Route::get('/page/tambah', [App\Http\Controllers\PageController::class, 'tambah'])->name('page.tambah');
        Route::post('/page/prosesTambah', [App\Http\Controllers\PageController::class, 'prosesTambah'])->name('page.prosesTambah');
        Route::get('/page/ubah/{id}', [App\Http\Controllers\PageController::class, 'ubah'])->name('page.ubah');
        Route::post('/page/prosesUbah', [App\Http\Controllers\PageController::class, 'prosesUbah'])->name('page.prosesUbah');
        Route::get('/page/hapus/{id}', [App\Http\Controllers\PageController::class, 'hapus'])->name('page.hapus'); 

        Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
        Route::get('/menu/tambah', [App\Http\Controllers\MenuController::class, 'tambah'])->name('menu.tambah');
        Route::post('/menu/prosesTambah', [App\Http\Controllers\MenuController::class, 'prosesTambah'])->name('menu.prosesTambah');
        Route::get('/menu/ubah/{id}', [App\Http\Controllers\MenuController::class, 'ubah'])->name('menu.ubah');
        Route::post('/menu/prosesUbah', [App\Http\Controllers\MenuController::class, 'prosesUbah'])->name('menu.prosesUbah');
        Route::get('/menu/hapus/{id}', [App\Http\Controllers\MenuController::class, 'hapus'])->name('menu.hapus'); 
        Route::get('/menu/order/{idMenu}/{idSwap}', [App\Http\Controllers\MenuController::class, 'order'])->name('menu.order');

    });

    Route::get('/logout',[App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
    
});

Route::get('files/{filename}', function ($filename){
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)){
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response -> header("Content-Type", $type);
    return $response;
})->name('storage');

