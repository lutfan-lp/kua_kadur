<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriMaklumat extends Model
{
  protected $table = "kategori_maklumat";

  protected $primaryKey = "id_kategori_maklumat";

  protected $fillable = ["nama_kategori_maklumat"];
}