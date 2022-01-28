@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Profil</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid" xstyle="background: #d48bd6">
			
			<div class="span12">
				<h3>Profil</h3>
				<hr class="soft"/>
				<form action="{{ route('web.ubahprofil') }}" class="form-horizontal qtyFrm" method="post">
                    @csrf
                    <div class="control-group">
					    <label class="control-label"><span>Nama</span></label>
					    <div class="controls">
                            <input type="text" name="nama" placeholder="Nama" value="{{ $pelanggan->nama }}" required />
					    </div>
				    </div>              
                    <div class="control-group">
					    <label class="control-label"><span>Jenis Kelamin</span></label>
					    <div class="controls">
                           
                            <select name="jeniskelamin">
                                <option value="">Pilih...</option>
                                <option value="L" {{ $pelanggan->jeniskelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ $pelanggan->jeniskelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Tempat Lahir</span></label>
					    <div class="controls">
                            <input type="text" name="tempatlahir" value="{{ $pelanggan->tempatlahir }}" placeholder="Tempat Lahir" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Tanggal Lahir</span></label>
					    <div class="controls">
                            <input type="date" name="tanggallahir" value="{{ $pelanggan->tanggallahir }}" placeholder="Tanggal Lahir" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Alamat</span></label>
					    <div class="controls">
                            <input type="text" name="alamat" placeholder="Alamat" value="{{ $pelanggan->alamat }}" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>No Hp</span></label>
					    <div class="controls">
                            <input type="text" name="nohp" value="{{ $pelanggan->nohp }}" placeholder="No HP" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Username</span></label>
					    <div class="controls">
                            <input type="text" name="username" value="{{ $pelanggan->username }}"  placeholder="Username" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Password</span></label>
					    <div class="controls">
                            <input type="password" name="passwordnya" placeholder="Password" requiredx />
					    </div>
				    </div>
				    <button type="submit" onClick = "document.getElementById('addcart').submit();" class="shopBtn"><span class=" icon-shopping-cart"></span> Ubah</button>
				</form>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection