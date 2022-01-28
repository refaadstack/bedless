<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $guarded = [];
    public $timestamps = false;

    public function konfirmasi() {
        return $this->hasOne(Konfirmasi::class);
    }

    public function expedisi() {
        return $this->belongsTo(Expedisi::class);
    }

    static function updateJumlah($idbarang,$jumlah,$ukuran) {

        $barang = Barang::find($idbarang);

        if($barang->kategori->jenisukuran == 'Banyak') {
            $ukuranfield = 'ukuran_'.$ukuran;
    
            DB::table('barang')
                ->where('id','=',$idbarang)
                ->update([
                    $ukuranfield =>DB::raw($ukuranfield.' - '.$jumlah)
                ]);
        } else if($barang->kategori->jenisukuran == 'Satu') {
            DB::table('barang')
                ->where('id','=',$idbarang)
                ->update([
                    'jumlah' => DB::raw('jumlah - '.$jumlah)
                ]);
        }
    }


    static function getPemesananPelanggan($idpelanggan) {
        $q = "SELECT pemesanan.* FROM pemesanan WHERE pelanggan_id = $idpelanggan";

        return collect(DB::select(DB::raw($q)));
    }

    static function getPemesananDetail($idpemesanan) {
        $q = "SELECT pemesanan_detail.*,barang.nama FROM pemesanan_detail 
                INNER JOIN barang ON pemesanan_detail.barang_id = barang.id 
                WHERE pemesanan_detail.pemesanan_id = '$idpemesanan'";
        return collect(DB::select(DB::raw($q)));
    }

    static function pemesananbulan($bulan,$tahun) {
     
        $q = "SELECT * FROM (
                SELECT pemesanan.id,pelanggan.nama,pemesanan.kodepemesanan,pemesanan.tanggalpemesanan,pemesanan.total FROM pemesanan 
                    INNER JOIN pelanggan ON pemesanan.pelanggan_id = pelanggan.id
                    INNER JOIN expedisi ON pemesanan.expedisi_id = expedisi.id
                WHERE YEAR(pemesanan.tanggalpemesanan) = '$tahun' AND MONTH(pemesanan.tanggalpemesanan) = '$bulan'
                UNION ALL
                SELECT pemesanan.id,'Pelanggan Offline',pemesanan.kodepemesanan,pemesanan.tanggalpemesanan,pemesanan.total  FROM pemesanan  
                WHERE YEAR(tanggalpemesanan) = '$tahun' AND MONTH(tanggalpemesanan) = '$bulan' AND pelanggan_id = -99)
            AS tbltemp ORDER BY kodepemesanan";

        return collect(DB::select(DB::raw($q)));
    }

    static function pemesanankeluarbulan($bulan,$tahun) {
     
        $q = "SELECT * FROM (
                SELECT pemesanan.id,pelanggan.nama,pemesanan.kodepemesanan,pemesanan.tanggalpemesanan,pemesanan.total ,
                    barang.kode, barang.nama as namabarang, pemesanan_detail.jumlah, pemesanan_detail.harga, pemesanan_detail.hargabeli
                    FROM pemesanan 
                    INNER JOIN pelanggan ON pemesanan.pelanggan_id = pelanggan.id
                    INNER JOIN pemesanan_detail ON pemesanan.id = pemesanan.id
                    INNER JOIN barang ON pemesanan_detail.barang_id = barang.id
                    INNER JOIN expedisi ON pemesanan.expedisi_id = expedisi.id
                    WHERE YEAR(pemesanan.tanggalpemesanan) = '$tahun' AND MONTH(pemesanan.tanggalpemesanan) = '$bulan'
                    UNION ALL
                    SELECT pemesanan.id,'Pelanggan Offline',pemesanan.kodepemesanan,pemesanan.tanggalpemesanan,pemesanan.total,
                    barang.kode, barang.nama, pemesanan_detail.jumlah, pemesanan_detail.harga,pemesanan_detail.hargabeli
                    FROM pemesanan  
                    INNER JOIN pemesanan_detail ON pemesanan.id = pemesanan.id
                    INNER JOIN barang ON pemesanan_detail.barang_id = barang.id
                    WHERE YEAR(pemesanan.tanggalpemesanan) = '$tahun' AND MONTH(pemesanan.tanggalpemesanan) = '$bulan' AND pelanggan_id = -99)
            AS tbltemp ORDER BY kodepemesanan";

        return collect(DB::select(DB::raw($q)));
    }
}
