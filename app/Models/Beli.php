<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beli extends Model
{
    use HasFactory;

    protected $table = 'beli';
    protected $guarded = [];
    public $timestamps = false;

    static function updateJumlah($idbarang,$jumlah,$ukuran) {

        $barang = Barang::find($idbarang);

        if($barang->kategori->jenisukuran == 'Banyak') {
            $ukuranfield = 'ukuran_'.$ukuran;
    
            DB::table('barang')
                ->where('id','=',$idbarang)
                ->update([
                    $ukuranfield =>DB::raw($ukuranfield.' + '.$jumlah)
                ]);
        } else if($barang->kategori->jenisukuran == 'Satu') {
            DB::table('barang')
                ->where('id','=',$idbarang)
                ->update([
                    'jumlah' => DB::raw('jumlah + '.$jumlah)
                ]);
        }
    }

    static function pembelian($bulan,$tahun) {
        $q = "SELECT beli.*, barang.kode as kodebarang,barang.nama, beli_detail.* FROM beli
        INNER JOIN beli_detail ON beli.id = beli_detail.beli_id
        INNER JOIN barang ON beli_detail.barang_id = barang.id
        WHERE YEAR(beli.tanggal) = '$tahun' AND MONTH(beli.tanggal) = '$bulan'";
        return collect(DB::select(DB::raw($q)));
    }
}
