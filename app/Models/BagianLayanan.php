<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BagianLayanan extends Model
{
    protected $primaryKey = "id_bagian_layanan";

    protected $fillable = ["nama_bagian_layanan", "koordinator_bagian", "kontak"];
}
