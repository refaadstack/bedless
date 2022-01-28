<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi {{ $pemesanan->kodepemesanan }}
    </title>

    <style>
        /* main.css */
    </style>
</head>

<body onload="window.print();" layout="potrait">

    <?php
    function garis() {
        $gar = "";
        for($i=1; $i<=80; $i++) {
            $gar .= '-';
        }

        return $gar;
    }
    ?>

   <table>
        <tr>
            <td align="center" colspan="3">{{ env('APP_NAME') }}</td>
        </tr>

        @php
        $alamat = \App\Models\Infoweb::find(5);
        @endphp
        <tr>
            <td align="center" colspan="3">{!! $alamat->deskripsi !!}</td>
        </tr>
        <tr>
            <td colspan="3"><?php echo garis() ?></td>
        </tr>
        <tr>
            <td>Kode</td>
            <td>:</td>
            <td><?php echo $pemesanan->kodepemesanan ?></td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo $pemesanan->tanggalpemesanan ?></td>
        </tr>
            
        <tr>
            <td colspan="3"><?php echo garis() ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" border="0">
                    <tr>
                        <td width="70">Barang</td>
                        <td width="20">Qty</td>
                        <td width="40">Harga</td>
                        <td width="80">Total</td>
                    </tr>
                    @php 
                    $no = 1;
                    $subtotal = 0;
                    $grandtotal = 0;
                    @endphp
                    @foreach($tabel as $rs)

                        @php
                        $subtotal = $rs->jumlah * $rs->harga;
                        $grandtotal += $subtotal;
                        @endphp
                    <tr>
                        <td>{{ $rs->barang->nama }}</td>
                        <td>{{ $rs->jumlah }}</td>
                        <td>@currency($rs->harga)</td>
                        <td>@currency($subtotal)</td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3"><?php echo garis() ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" border="0">
                   
                    <tr>
                        <td colspan="" width="150">Total</td>
                        <td width="80">@currency($grandtotal)</td>
                    </tr>
                        <tr>
                        <td colspan="">Bayar</td>
                        <td>@currency($pemesanan->bayar)</td>
                    </tr>
                        <tr>
                        <td colspan="">Kembalian</td>
                        <td>@currency(abs($pemesanan->kembalian))</td>
                    </tr>
                </table>
            </td>
        </tr>
</body>

</html>