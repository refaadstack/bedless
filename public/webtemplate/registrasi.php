<?php
error_reporting(0);
session_start();

$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>

<link rel="stylesheet" href="css/tanggal/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-ui-timepicker-addon.js"></script>

  <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.css">
<style >
input {
		background: #fafafa none repeat scroll 0 0;
		border: 1px solid #ddd;
		border-radius: 30px;
		height: 40px;
		font-family: 'Raleway', sans-serif;
		font-size: 13px;
		padding: 0 15px;	
}
textarea {
		background: #fafafa none repeat scroll 0 0;
		border: 1px solid #ddd;
		border-radius: 30px;
		height: 100px;
		font-family: 'Raleway', sans-serif;
		font-size: 13px;
		padding: 0 15px;
			width :300px;
}
button{
	background: #eee none repeat scroll 0 0;
    border: 1px solid #ddd;
    border-radius: 30px;
    color: #333;
    font-size: 14px;
    padding: 8px 25px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
</style >

    <script>
	
        function validasi(){
                var namamember  = document.getElementById('namamember');
				var tempatlahir  = document.getElementById('tempatlahir');
				var tanggallahir  = document.getElementById('datepicker');
				
				var nohp  = document.getElementById('nohp');
				var email  = document.getElementById('email');
				var username  = document.getElementById('username');
				
				var password  = document.getElementById('password');
				var konfpassword  = document.getElementById('konfpassword');
				var konfcaptcha  = document.getElementById('konfcaptcha');
				
				if (password.value != konfpassword.value){
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
 <script>
 $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'yy-mm-dd',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '0d'
        });
		
    });

  </script>
  

  <div id ="reg" style = "width :85%;margin :auto;background:white">
	<div id = "wrp" style = "margin-left:20%">
          <h1 style = "font-size :32px;" >
            PENDAFTARAN</h1>
            <span class="arrdot">
            </span>
          <hr style = "width:80%;margin-left:0">
         <form id="registrasi" method="POST"  class="form-horizontal" action = "simpanakun.php" onsubmit ="return validasi()" >
									<fieldset>
											<div class="control-group">											
											<label class="control-label" for="nama">Nama <font color = "red">*</font></label>
											<div class="controls">
												<input style = "width:300px" type="text" class="textbox" id="namamember" name = "namamember" value="" >
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										 <div class="control-group">											
											<label class="control-label"><br>Jenis Kelamin <font color = "red">*</font></label>
											
                                            
                                            <div class="controls" style ="margin-left:20px">
                                            <label class="radio inline">
                                              <input type="radio" style = "height: 20px;" checked = 1 name="jeniskelamin" value = "Laki-Laki"> Laki-Laki
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" style = "height: 20px;" name="jeniskelamin" value = "Perempuan"> Perempuan
                                            </label>
                                          </div>	<!-- /controls -->			
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="tempatlahir"><br>Tempat Lahir <font color = "red">*</font></label>
											<div class="controls">
												<input type="text" class="span6" style = "width:300px" id="tempatlahir" name = "tempatlahir" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="datepicker"><br>Tanggal Lahir <font color = "red">*</font></label>
											<div class="controls">
												<input type="text" class="span6" style = "width:300px" id="datepicker" name = "tanggallahir" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="alamat"><br>Alamat <font color = "red">*</font></label>
											<div class="controls">
												<textarea class="span3" id="alamat"  name="alamat" ></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="nohp"><br>Nomor Handphone <font color = "red">*</font></label>
											<div class="controls">
												<input type="text" class="span3" id="nohp" name="nohp" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">					
										
											<label class="control-label" for="email"><br>Email <font color = "red">*</font></label>
											<div class="controls">
												<input type="email" class="span3" id="email" name="email" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										
										<div class="control-group">											
											<label class="control-label"  for="line"><br>Username <font color = "red">*</font></label>
											<div class="controls">
												<input type="text" style = "width:300px"  class="span4" id="username" name="username" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label"  for="line"><br>Password <font color = "red">*</font></label>
											<div class="controls">
												<input type="password" style = "width:300px"  class="span4" id="password" name="password" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label"  for="line"><br>Konfirmasi Password <font color = "red">*</font></label>
											<div class="controls">
												<input type="password" style = "width:300px"  class="span4" id="konfpassword" name="konfpassword" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
									
										 <br />
										
										CAPTCHA : 
										<?php
										echo '<img src="http://localhost' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
										
										?> <br/><br/>
											 <div class="control-group">											
											<label class="control-label"  for="line">Masukan Kode Yang Tertera Diatas <font color = "red">*</font></label>
											<div class="controls">
												<input type="text" style = "width:300px"  class="span4" id="konfcaptcha" name="konfcaptcha" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<br>
										<div class="form-actions" style = "margin-bottom:20px;">
											<button type="submit" style ="float :none;" class="mybutton">Daftar</button> 
											
										</div> <!-- /form-actions -->
										
									</fieldset>
								</form>
     </div>
	 </div>