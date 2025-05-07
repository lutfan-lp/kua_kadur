<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $primaryKey = "id_layanan";

    protected $fillable = ["nama_layanan", "deskripsi_layanan", "gambar_layanan", "id_bagian_layanan", "total_views"];

    public function bagian_layanan()
    {
        return $this->belongsTo(BagianLayanan::class, 'id_bagian_layanan');
    }
}
