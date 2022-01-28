<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanandetail extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_detail';
    protected $guarded = [];
    public $timestamps = false;

    public function barang() {
        return $this->belongsTo(Barang::class);
    }
}
