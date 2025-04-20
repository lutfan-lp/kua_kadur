<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profile";

  protected $primaryKey = "id_profile";

  protected $fillable = ["judul_profile", "isi_profile", "gambar_profile"];

}