<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori; // TAMBAHKAN

class Barang extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama', 'harga', 'stok', 'kategori_id'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
