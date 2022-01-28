<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
<?php
error_reporting(0);
session_start();

$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<script>
	
        function validasi(){
                var namamember  = document.getElementById('a');
				var tempatlahir  = document.getElementById('c');
				var tanggallahir  = document.getElementById('d');
				
				var nohp  = document.getElementById('f');
				var email  = document.getElementById('g');
				var username  = document.getElementById('h');
				
				var password  = document.getElementById('i');
				var konfpassword  = document.getElementById('j');
				var konfcaptcha  = document.getElementById('konfcaptcha');
				
				if (i.value != j.value){
					alert('Konfirmasi Password Tidak Valid');
					return false;
				}
				
				
				
            	 if (harusDiisi(namamember, "Nama member Belum Diisi")) {
				  if (harusDiisi(tempatlahir, "Tempat lahir Belum Diisi")) {
				  if (harusDiisi(tanggallahir, "Tanggal lahir Belum Diisi")) {
				  if (harusDiisi(alamat, "Alamat Belum Diisi")) {
				  if (harusDiisi(nohp, "Nomor Handphone Belum Diisi")) {
				  if (harusDiisi(email, "Email Belum Diisi")) {
					if (harusDiisi(username, "Username Belum Diisi")) {
				 if (harusDiisi(password, "Password Belum Diisi")) {
				 if (konfcaptcha.value != '<?php echo $_SESSION['captcha']['code'] ; ?>'){
					alert('Masukan CAPTCHA dengan benar');
					return false;
				}
                    
                    return true
				      };
					  };
					  };
					 };
					};
				   }; 
				  }; 
				 };
				
                  
					
                return false;
            }
			
            function harusDiisi(att, msg){
                if (att.value.length == 0) {
                    alert(msg);
                    att.focus();
                    return false;
                }
				
                return true;
            } 
 </script>

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Registrasi</li>
    </ul>
    
<div class="well well-small">	
	<h2> Registrasi</h2>	
	<hr class="soft"/>
	<form id="registrasi" method="POST" class="bs-docs-example form-horizontal" action = "register_simpan.php" onsubmit ="return validasi()">
            <div class="control-group">
              <label class="control-label">Nama Lengkap <font color = "red">*</font></label>
              <div class="controls">
                <input type="text" name="a" id="a" placeholder="Nama Lengkap">
              </div>
            </div>
    		<div class="control-group">											
			<label class="control-label">Jenis Kelamin <font color = "red">*</font></label>
            <div class="controls">
            <label class="radio inline">
            <input type="radio" checked = 1 name="b" id="b" value = "Laki-Laki"> Laki-Laki
            </label>
            <br />
            <label class="radio inline">
            <input type="radio" name="b" id="b" value = "Perempuan"> Perempuan
            </label>
            </div>	<!-- /controls -->			
			</div> <!-- /control-group -->
            <div class="control-group">
            <label class="control-label">Tempat Lahir <font color = "red">*</font></label>
            <div class="controls">
            <input type="text" name="c" id="c" placeholder="Tempat Lahir">
            </div>
            </div>
            <div class="control-group">											
			<label class="control-label" for="datepicker">Tanggal Lahir <font color = "red">*</font></label>
			<div class="controls">
			<input class="span4" required type="date" date-format="yyyy-mm-dd" style = "width:205px" name = "d" id="d" value="">
			</div> <!-- /controls -->				
			</div> <!-- /control-group -->
            <div class="control-group">											
			<label class="control-label" for="alamat">Alamat <font color = "red">*</font></label>
			<div class="controls">
			<textarea class="span3" id="alamat"  name="e" id="e" ></textarea>
			</div> <!-- /controls -->				
			</div> <!-- /control-group -->
            <div class="control-group">
              <label class="control-label">No Handphone <font color = "red">*</font></label>
              <div class="controls">
                <input type="text" name="f" id="f" placeholder="No Handphone">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email <font color = "red">*</font></label>
              <div class="controls">
                <input type="text" name="g" id="g" placeholder="Email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username <font color = "red">*</font></label>
              <div class="controls">
                <input type="text" name="h" id="h" placeholder="Username">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password <font color = "red">*</font></label>
              <div class="controls">
                <input type="password" name="i" id="i" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Konfirmasi Password <font color = "red">*</font></label>
              <div class="controls">
                <input type="password" name="j" id="j" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">CAPTCHA </label>
              <div class="controls">
                <?php
										echo '<img src="http://localhost' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
										
										?>
              </div>
            </div>
            <div class="control-group">											
			<label class="control-label"  for="line">Masukan Kode CAPTCHA <font color = "red">*</font></label>
			<div class="controls">
			<input type="text" style = "width:205px" class="span4" name="konfcaptcha" id="konfcaptcha" value="">
			</div> <!-- /controls -->				
			</div> <!-- /control-group -->
            <div class="form-actions" style = "margin-bottom:20px;">
			<button type="submit" style ="float :none;" class="mybutton">Registrasi</button> 
			</div>
          </form>
</div>
</div>
</div>
<!-- 
Clients 
-->

<?php include ('footer.php');?>