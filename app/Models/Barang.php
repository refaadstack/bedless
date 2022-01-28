<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = [];
    public $timestamps = false;

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function pemesanandetail() {
        return $this->hasMany(Pemesanandetail::class);
    }
}
