<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from barang_laku");
?>

  <script type='text/javascript' src='js/jquery-1.4.4.min.js'></script>
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  
  
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="css/result-light.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

<script>
function isNumberKey(evt){
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57) )
					return false;
				return true;
			}
</script>

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(function () {
    $("#d").dialog({
        autoOpen: false,
        show: "blind",
        hide: "explode"
    });
    $("#c").hover(function () {
        $("#d").dialog('open');
    }, function () {
        $("#d").dialog('close');
    }).mousemove(function (e) {
        $("#d").dialog("option", { position: [e.pageX+5, e.pageY+5] });
    });
});
});//]]>  

</script>
 <link rel="stylesheet" href="css/bootstrap.css"> 
            <!--<script src="js/jquery.js"></script> -->
            <script src="js/jquery.ui.datepicker.js"></script>
            <script>
                //mendeksripsikan variabel yang akan digunakan
                var nota;
                var tanggal;
                var kodepenjualan;
                var nama;
                var harga;
                var jumlah;
         
                $(function(){
                    
                    //isinya akan masuk di combo box
                    $("#kode").load("pk.php","op=ambilproduk");
                    
                    //meload isi tabel
                    $("#produk").load("pk.php","op=produk");
                    
                    //mengkosongkan input text dengan masing2 id berikut
                    $("#nama").val("");
                    $("#harga").val("");
                    $("#jumlah").val("");
                  
                                
                    //jika ada perubahan di kode 
                    $("#kode").change(function(){
                        kode=$("#kode").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"pk.php",
                            data:"op=ambildata&kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                $("#nama").val(data[0]);
                                $("#harga").val(data[1]);
                               
                                $("#jumlah").focus();
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });
                    
                    //jika tombol tambah di klik
                    $("#tambah").click(function(){
                        kode=$("#kode").val();
                        jumlah=$("#jumlah").val();
                        if(kode=="Kode produk"){
                            alert("Kode produk Harus diisi");
                            exit();
                        }
                        nama=$("#nama").val();
                        harga=$("#harga").val();
                        
                                                
                        $("#status").html("sedang diproses. . .");
                        $("#loading").show();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=tambah&kode="+kode+"&nama="+nama+"&harga="+harga+"&jumlah="+jumlah,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html(" Transaksi Berhasil disimpan. . .");
                                }else{
                                    $("#status").html(msg);
                                }
                                $("#loading").hide();
                                $("#nama").val("");
                                $("#harga").val("");
                                $("#jumlah").val("");
                                $("#kode").load("pk.php","op=ambilproduk");
                                $("#produk").load("pk.php","op=produk");
                            }
                        });
                    });
                    
					//jika tombol tambah di klik
                    $("#tambahedit").click(function(){
                        nota=$("#nota").val();
						kode=$("#kode").val();
                        jumlah=$("#jumlah").val();
                        if(kode=="Kode produk"){
                            alert("Kode produk Harus diisi");
                            exit();
                        }
                        nama=$("#nama").val();
                        harga=$("#harga").val();
                        
                                                
                        $("#status").html("sedang diproses. . .");
                        $("#loading").show();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=tambahedit&nota="+nota+"&kode="+kode+"&nama="+nama+"&harga="+harga+"&jumlah="+jumlah,
                            cache:false,
                            success:function(msg){
                                if(msg=="sukses"){
                                    $("#status").html(" Transaksi Berhasil disimpan. . .");
                                }else{
                                    $("#status").html(msg);
                                }
                                $("#loading").hide();
                                $("#nama").val("");
                                $("#harga").val("");
                                $("#jumlah").val("");
                                location.reload();
                            }
                        });
                    });
                    
					
					
                    //jika tombol proses diklik
                    $("#proses").click(function(){
                        nota=$("#nota").val();
                        tanggal=$("#tanggal").val();
                        kembali=$("#kembali").val();
						if( kembali == '' ){
                            alert("Pembayaran Tidak Boleh Kosong;");
                            exit();
                        }
						
						 if(parseInt(kembali.replace(/,/g,'')) < 0 ){
                            alert("Pembayaran Tidak Boleh Kurang Dari Total;");
                            exit();
                        }
					
                        $.ajax({
                            url:"pk.php",
                            data:"op=proses&nota="+nota+"&tanggal="+tanggal,
                            cache:false,
                            success:function(msg){
                                if(msg=='sukses'){
                                    $("#status").html('Transaksi Berhasil');
									window.open("nota.php?kd=" + nota ,"","width = 600 height = 550");
                                    alert('Transaksi Berhasil');
									
                                    location.reload();
									exit();
                                }else{
                                    $("#status").html('Transaksi Gagal');
                                    alert('Transaksi Gagal');
                                    exit();
                                }
                              
                          
                            }
                        })
                    })
                });
				
				function isNumberKey(evt){
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 46 || charCode > 57) )
					return false;
				return true;
			}
			function ThousandSeparate()
			{


				if (arguments.length == 1)
				{
					var V = arguments[0].value;
					V = V.replace(/,/g,'');
					var R = new RegExp('(-?[0-9]+)([0-9]{3})'); 
					while(R.test(V))
					{
						V = V.replace(R, '$1,$2');
					}
					arguments[0].value = V;
					
				}
				else  if ( arguments.length == 2)
				{
					var V = document.getElementById(arguments[0]).value;
					var R = new RegExp('(-?[0-9]+)([0-9]{3})'); 
					while(R.test(V))
					{
						V = V.replace(R, '$1,$2');
					}
					document.getElementById(arguments[1]).innerHTML = V;
					 //document.getElementById('kembali').value =   parseInt(V.replace(',','')) - parseInt(document.getElementById('ttl3').innerHTML) ;
				}
				else return false;
			}   
            </script>
			
<div>
                <?php
				
                include "config.php";
                $p=isset($_GET['act'])?$_GET['act']:null;
                switch($p){
                    default:
                        echo "<table class='table table-bordered'>
                            <tr>
                                <td colspan='4'><a href='?page=penjualan&act=tambah' class='btn btn-primary'>Input Transaksi</a></td>
                            </tr>
                                <tr>
                                    <td>No Transaksi</td>
                                    <td>Tanggal</td>
                                    <td>Total</td>
                                    <td>Action</td>
                                </tr>";
                                $query=mysql_query("select * from penjualanproduk order by 1 desc");
                                while($r=mysql_fetch_array($query)){
									$qr = mysql_query("select sum(subtotal) from detailpenjualanproduk where kodepenjualan = '$r[kodepenjualan]'");
									$hsl2 = mysql_fetch_array($qr);
									
								  echo "<tr>
                                            <td><a href='?page=penjualan&act=detail&nota=$r[kodepenjualan]'>$r[kodepenjualan]</a></td>
                                            <td>$r[tanggal]</td>
                                            <td>Rp. $hsl2[0]</td>
                                            <td>" ;
									echo	"  <a href='?page=penjualan&act=detail&nota=$r[kodepenjualan]'> Detail </a> | 
												</a> <a href='?page=penjualan&act=edit&nota=$r[kodepenjualan]'> Edit </a> |
													</a> <a href='konfirmasihapus.php?kode=$r[kodepenjualan]'> Hapus </a>
                                            </td>
                                          </tr>";
                                }
                                echo"</table>";
                       
                        break;
                    case "tambah":
                        $tgl=date('j F Y');
                        //untuk autonumber di kode penjualan
                         
							$query = mysql_query("Select right(max(kodepenjualan),8) from penjualanproduk where kodepenjualan like 'PN%'");
							$result = mysql_fetch_array($query);
							
							$jumlahrow = mysql_num_rows($query);
							
							if ($jumlahrow == 0){
								
								echo "PN00000001";
							
							}else
							{
								$angka =  "PN" . str_pad(strval($result[0] + 1),8,"0",STR_PAD_LEFT);
								
			echo "<div class='navbar-form pull-left'>
                                No. Transaksi : <input type='text' id='nota' value='$angka' readonly >
                                <input type='text' id='tanggal' value='$tgl' readonly>   
                            </div>
							<div class='navbar-form pull-right' style = 'background: #ccc;'>
							<span style = 'font-size:42px;'><b id = 'totall'>Total : </b></span>
							</div>
							";

			echo "<div class='navbar-form pull-left'>
                                
                         
                            </div>";					
							}
                        
                            
                            echo'<br /><br /><legend>Tambah [<span style = "color:blue" id="status"></span>]</legend>
                            <label>Kode Produk</label>
                            <select id="kode"></select> <button id="cari" class="btn" Onclick = "window.open(\'cariproduk.php\', \'winpopup\', \'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=800,height=400\');">Cari</button>
							<br />
                            <input type="text" id="nama" placeholder="Nama produk" readonly>
                            <input type="text" id="harga" placeholder="Harga" class="span2" readonly>
                            <input type="text" id="jumlah" onkeypress="return isNumberKey(event)" placeholder="Jumlah Beli" class="span2">
                            <button id="tambah" class="btn">Tambah</button>
                            
                            
                            <table id="produk" class="table table-bordered">
                                    
                            </table>
							<div class="navbar-form pull-right" style = "background: #fff;">
							<span style = "font-size:16px;">
							<table>
							<tr><td>
							Pembayaran</td><td><input id="bayar" onkeypress="return isNumberKey(event);" onkeyup = "ThousandSeparate(this);document.getElementById(\'kembali\').value =  parseInt(this.value.replace(/,/g,\'\')) - parseInt(document.getElementById(\'ttl3\').innerHTML) ; ThousandSeparate(document.getElementById(\'kembali\'));  " type = "text" value = ""/></td>
							</tr>
							<tr>
							<td>
							Kembalian</td><td><input readonly id = "kembali" type = "text" value = "" / ></td></tr></table>
							</span>
							</div>
                            <div class="form-actions">
                                <button id="proses">Proses</button>
								<button onClick="window.location=\'penjualan.php\';">Lihat Data Penjualan</button>
                            </div>';
                        break;
                    case "detail":
                        echo "<legend>Bukti Pembayaran</legend>";
                        $nota=$_GET['nota'];
                        $query=mysql_query("select penjualanproduk.kodepenjualan,namaproduk,
                                           harga,jumlah,subtotal
                                           from detailpenjualanproduk,penjualanproduk
                                           where penjualanproduk.kodepenjualan=detailpenjualanproduk.kodepenjualan 
                                           and detailpenjualanproduk.kodepenjualan='$nota'");
                        $nomor=mysql_fetch_array(mysql_query("select * from penjualanproduk where kodepenjualan='$nota'"));
						 $ttl=mysql_fetch_array(mysql_query("select sum(subtotal) as ttl from detailpenjualanproduk where kodepenjualan='$nota'"));
						echo "<div class='navbar-form pull-right'>
                                Nota : <input type='text' value='$nomor[kodepenjualan]' disabled>
                                <input type='text' value='$nomor[tanggal]' disabled>
                            </div>";
                        echo "<table class='table table-hover' >
                                <thead>
                                    <tr>
                                        <td>Kode produk</td>
                                        <td>Nama produk</td>
                                        <td>Harga</td>
                                        <td>Jumlah</td>
                                        <td>Subtotal</td>
                                    </tr>
                                </thead>";
                                while($r=mysql_fetch_row($query)){
                                    echo "<tr>
                                            <td>$r[0]</td>
                                            <td>$r[1]</td>
                                            <td>$r[2]</td>
                                            <td>$r[3]</td>
                                            <td>$r[4]</td>
                                        </tr>";
                                }
                                echo "<tr>
                                        <td colspan='4'><h4 align='right'>Total</h4></td>
                                        <td colspan='5'><h4>$ttl[ttl]</h4></td>
                                    </tr>
                                    </table>
									<br>
									<a href='penjualan.php' class='btn btn-info'>Kembali</a>
									";
                        break;
						
					case "edit":
                        echo "<legend>Edit </legend>";
                        $nota=$_GET['nota'];
                        $query=mysql_query("select detailpenjualanproduk.kodeproduk,namaproduk,
                                           harga,jumlah,subtotal
                                           from detailpenjualanproduk,penjualanproduk
                                           where penjualanproduk.kodepenjualan=detailpenjualanproduk.kodepenjualan 
                                           and detailpenjualanproduk.kodepenjualan='$nota'");
                        $nomor=mysql_fetch_array(mysql_query("select * from penjualanproduk where kodepenjualan='$nota'"));
						 $ttl=mysql_fetch_array(mysql_query("select sum(subtotal) as ttl from detailpenjualanproduk where kodepenjualan='$nota'"));
						echo "<div class='navbar-form pull-left'>
                                Nota : <input id = 'nota' type='text' value='$nomor[kodepenjualan]' readonly>
                                <input type='text' value='$nomor[tanggal]' disabled>
                            </div>";
						 echo'<legend><span style = "color:blue" id="status"></span></legend>
                            <label>Kode Produk</label>
                            <select id="kode"></select><button id="cari" class="btn" Onclick = "window.open(\'cariproduk.php\', \'winpopup\', \'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=800,height=400\');">Cari</button>
							<br />
                            <input type="text" id="nama" placeholder="Nama produk" readonly>
                            <input type="text" id="harga" placeholder="Harga" class="span2" readonly>
                            <input type="text" id="jumlah" onkeypress="return isNumberKey(event)" placeholder="Jumlah Beli" class="span2">
                            <button id="tambahedit" class="btn">Tambah</button>
                            ';
                        echo "<table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <td>Kode produk</td>
                                        <td>Nama produk</td>
                                        <td>Harga</td>
                                        <td>Jumlah</td>
                                        <td>Subtotal</td>
										<td>Aksi</td>
                                    </tr>
                                </thead>";
                                while($r=mysql_fetch_row($query)){
                                    echo "<tr>
                                            <td>$r[0]</td>
                                            <td>$r[1]</td>
                                            <td>$r[2]</td>
                                            <td>$r[3]</td>
                                            <td>$r[4]</td>
											<td><a href='pk.php?op=hapusedit&kode=$r[0]&nota=$nomor[kodepenjualan]' id='hapus'>Hapus</a></td>
                                        </tr>";
                                }
                                echo "<tr>
                                        <td colspan='4'><h4 align='right'>Total</h4></td>
                                        <td colspan='5'><h4>$ttl[ttl]</h4></td>
                                    </tr>
                                    </table>
									<br>
									<a href='penjualan.php' class='btn btn-success'>Selesai</a><a href='penjualan.php' class='btn btn-info'>Kembali</a>
									";
                        break;
                }
                ?>
            </div>

<?php 
include 'footer.php';

?>