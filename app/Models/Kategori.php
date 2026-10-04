<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang; //TAMBAHKAN

class Kategori extends Model
{
    public $timestamps = false;

    protected $fillable = ['nama', 'deskripsi'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
