<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maklumat extends Model
{
    protected $table = "maklumats";

    protected $primaryKey = "id_maklumat";

    protected $fillable = ["judul_maklumat", "isi_maklumat", "gambar_maklumat", "id_kategori_maklumat", "total_views"];

    public function kategori_maklumat()
    {
        return $this->belongsTo(KategoriMaklumat::class, 'id_kategori_maklumat');
    }
}
