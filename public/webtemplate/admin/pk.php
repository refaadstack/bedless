<?php
include "config.php";
$op=isset($_GET['op'])?$_GET['op']:null;

if($op=='ambilproduk'){
    $data=mysql_query("select * from produk order by nama_barang");
    echo"<option>Kode produk</option>";
    while($r=mysql_fetch_array($data)){
        echo "<option value='$r[kode_produk]'>$r[nama_barang] - $r[kode_produk]</option>";
    }
}
elseif($op=='ambildata'){
    $kode=$_GET['kode'];
    $dt=mysql_query("select * from produk where kode_produk='$kode'");

	    $d=mysql_fetch_array($dt);
	
		$hrgbrg = $d['harga_barang'];
	

    echo $d['nama_barang']."|".$hrgbrg;
	
}elseif($op=='tambah'){
    $kode=$_GET['kode'];
    $nama=$_GET['nama'];
    $harga=$_GET['harga'];
    $jumlah=$_GET['jumlah'];
    $subtotal=$harga*$jumlah;
    
	if ($jumlah <= 0){
		echo "jumlah 0";
	}else{
		$query = mysql_query("select * from produk where kode_produk = '$kode'");
		$hsl = mysql_fetch_array($query);
		
		if($hsl['stok'] < $jumlah){
			echo "Produk Tidak Mencukupi";
		}else{
			$query2 = mysql_query("select * from detailpenjualanproduk_tmp where kodeproduk = '$kode'");
			$jml  = mysql_num_rows($query2);
			if($jml > 0 ){
				$tambah=mysql_query("Update  detailpenjualanproduk_tmp set jumlah = jumlah + $jumlah where kodeproduk = '$kode'");
				$tambah=mysql_query("Update  detailpenjualanproduk_tmp set subtotal = jumlah * harga  where kodeproduk = '$kode'");
			}else{
				$tambah=mysql_query("INSERT into detailpenjualanproduk_tmp (kodeproduk,namaproduk,jumlah,harga,subtotal)
							values ('$kode','$nama','$jumlah','$harga','$subtotal')");
			}
		
		
		if($tambah){
			echo "sukses";
		}else{
			echo "Transaksi Gagal/Produk Sudah Ada";
		}
		}
	}
}elseif($op=='tambahedit'){
	 $nota=$_GET['nota'];
    $kode=$_GET['kode'];
    $nama=$_GET['nama'];
    $harga=$_GET['harga'];
    $jumlah=$_GET['jumlah'];
    $subtotal=$harga*$jumlah;
    
	if ($jumlah <= 0){
		echo "jumlah 0";
	}else{
		$query = mysql_query("select * from produk where kode_produk = '$kode'");
		$hsl = mysql_fetch_array($query);
		
		if($hsl['stok'] < $jumlah){
			echo "Produk Tidak Mencukupi";
		}else{
		$tambah=mysql_query("INSERT into detailpenjualanproduk (kodepenjualan,kodeproduk,namaproduk,jumlah,harga,subtotal)
							values ('$nota','$kode','$nama','$jumlah','$harga','$subtotal')");
		
				
		if($tambah){
			mysql_query("update produk set stok = stok - $jumlah where kode_produk =  '$kode' ");
			echo "sukses";
		}else{
			echo "Transaksi Gagal/Produk Sudah Ada";
		}
		}
	}
}elseif($op=='produk'){
    $brg=mysql_query("select a.kodeproduk,a.namaproduk, a.harga, a.jumlah, a.subtotal from detailpenjualanproduk_tmp a left join produk b on a.kodeproduk = b.kode_produk");
    echo "<thead>
            <tr>
                <td>Kode produk</td>
                <td>Nama produk</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Subtotal</td>
                <td>Tools</td>
            </tr>
        </thead>";
    $total=mysql_fetch_array(mysql_query("select sum(subtotal) as total from detailpenjualanproduk_tmp"));
    while($r=mysql_fetch_array($brg)){
        echo "<tr>
                <td>$r[kodeproduk]</td>
                <td>$r[namaproduk]</td>
                <td>$r[harga]</td>
                <td><input  id = 'qty$r[kodeproduk]' value = '$r[jumlah]'  ></td>
                <td>$r[subtotal]</td>
                <td><input type = 'button' value = 'Edit' onclick = \"window.location = 'pk.php?op=editqty&kode=$r[kodeproduk]&qty=' + document.getElementById('qty$r[kodeproduk]').value \"  />
				<a href='pk.php?op=hapus&kode=$r[kodeproduk]' id='hapus'>Hapus</a></td>
			</tr>";
    }
    echo "<tr>
        <td colspan='3'>Total</td>
        <td colspan='4' id = 'ttl3'>$total[total]</td>
		<script> document.getElementById('totall').innerHTML = 'Rp. ". number_format($total['total'],0,',','.') . "' ;</script>
    </tr>
	";

}elseif($op=='hapus'){
    $kode=$_GET['kode'];
    $del=mysql_query("delete from detailpenjualanproduk_tmp where kodeproduk='$kode'");
    if($del){
        echo "<script>window.location='penjualan.php?page=penjualan&act=tambah';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='penjualan.php?page=penjualan&act=tambah';</script>";
    }

}
elseif($op=='editqty'){
    $kode=$_GET['kode'];
	$qty=$_GET['qty'];
	
	$query = mysql_query ("select * from produk where kode_produk = '$kode'");
	$hsl = mysql_fetch_array($query);
	
		if($hsl['stok'] < $qty){
			echo "<script>alert('stok tidak cukup');window.location='penjualan.php?page=penjualan&act=tambah';</script>";
		}else{
			$harga = $hsl['harga_barang'];
			
			$del=mysql_query("update  detailpenjualanproduk_tmp  set jumlah = $qty  , subtotal = $qty * $harga  where kodeproduk='$kode' ");
			if($del){
				echo "<script>alert('Edit Jumlah Berhasil');
					window.location='penjualan.php?page=penjualan&act=tambah';</script>";
			}else{
				echo "<script>alert('Edit Jumlah Gagal');
					window.location='penjualan.php?page=penjualan&act=tambah';</script>";
			}
		}

}
elseif($op=='hapusedit'){
    $kode=$_GET['kode'];
	$nota=$_GET['nota'];
    $del=mysql_query("delete from detailpenjualanproduk where kodeproduk='$kode' and kodepenjualan = '$nota'");
    if($del){
        echo "<script>window.location='penjualan.php?page=penjualan&act=edit&nota=$nota';</script>";
    }else{
        echo "<script>alert('Hapus Data Berhasil');
            window.location='penjualan.php?page=penjualan&act=edit&nota=$nota';</script>";
    }

}
elseif($op=='proses'){
    $nota=$_GET['nota'];
    $tanggal=$_GET['tanggal'];
	
	$querycek = mysql_query("select * from detailpenjualanproduk_tmp ");
	$jmlbg = mysql_num_rows($querycek);
	if($jmlbg<=0){
		echo "ERROR";
	}else{
		$simpan=mysql_query("insert into penjualanproduk(kodepenjualan,tanggal)
							values ('$nota',STR_TO_DATE('$tanggal','%d %M %Y'))");
		if($simpan){
			$query=mysql_query("select * from detailpenjualanproduk_tmp");
			while($r=mysql_fetch_row($query)){
				mysql_query("update produk set stok = stok - '$r[3]' where kode_produk =  '$r[0]' ");
				mysql_query("insert into detailpenjualanproduk(kodepenjualan,kodeproduk,namaproduk,harga,jumlah,subtotal)
							values('$nota','$r[0]','$r[1]','$r[2]','$r[3]','$r[4]')");
				
				
				
			}
			//hapus seluruh isi tabel sementara
			mysql_query("truncate table detailpenjualanproduk_tmp");
			
			echo "sukses";
		}else{
			echo "ERROR";
		}
	}
	
}elseif($op=='hapustransaksi'){
    $kode=$_POST['kode'];
	$password=$_POST['password'];
	session_start();
	
	if (md5($password) == $_SESSION['password']){
    $del=mysql_query("delete from penjualanproduk where kodepenjualan='$kode'");
	$del=mysql_query("delete from detailpenjualanproduk where kodepenjualan='$kode'");
   
    if($del){
        echo "<script>alert('Hapus Data Berhasil');window.location='penjualan.php';</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus');
            window.location='penjualan.php';</script>";
    }
	}else{
		 echo "<script>alert('Password Tidak Sesuai');window.location='penjualan.php';</script>";
	}

}

?>