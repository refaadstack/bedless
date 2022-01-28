@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Daftar</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">

			<div class="span12">
				<h3>Daftar</h3>
				<hr class="soft"/>
				<form action="{{ route('web.daftar.save') }}" class="form-horizontal qtyFrm" method="post">
                    @csrf
                    <div class="control-group">
					    <label class="control-label"><span>Nama</span></label>
					    <div class="controls">
                            <input type="text" name="nama" placeholder="Nama" required />
					    </div>
				    </div>              
                    <div class="control-group">
					    <label class="control-label"><span>Jenis Kelamin</span></label>
					    <div class="controls">
                           
                            <select name="jeniskelamin">
                                <option value="">Pilih...</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Tempat Lahir</span></label>
					    <div class="controls">
                            <input type="text" name="tempatlahir" placeholder="Tempat Lahir" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Tanggal Lahir</span></label>
					    <div class="controls">
                            <input type="date" name="tanggallahir" placeholder="Tanggal Lahir" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Alamat</span></label>
					    <div class="controls">
                            <input type="text" name="alamat" placeholder="Alamat" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>No Hp</span></label>
					    <div class="controls">
                            <input type="text" name="nohp" placeholder="No HP" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Username</span></label>
					    <div class="controls">
                            <input type="text" name="username" placeholder="Username" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Password</span></label>
					    <div class="controls">
                            <input type="password" name="passwordnya" placeholder="Password" required />
					    </div>
				    </div>
				    <button type="submit" onClick = "document.getElementById('addcart').submit();" class="shopBtn"><span class=" icon-shopping-cart"></span> Daftar</button>
				</form>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection