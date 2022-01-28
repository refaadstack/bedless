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
					    <label class="control-label"><span>Username</span></label>
					    <div class="controls">
                            <input type="text" name="username" placeholder="Username" required />
					    </div>
                    </div>
                    <div class="control-group">
					    <label class="control-label"><span>Password</span></label>
					    <div class="controls">
                            <input type="password" name="password" placeholder="Password" required />
					    </div>
				    </div>
				    <button type="submit" onClick = "document.getElementById('addcart').submit();" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection