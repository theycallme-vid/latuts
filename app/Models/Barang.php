<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori; // TAMBAHKAN

class Barang extends Model
{
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
