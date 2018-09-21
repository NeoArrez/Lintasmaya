@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Sukses :</strong> {{ Session::get('success')}}
	</div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-warning" role="alert">
		<strong>Info :</strong> {{ Session::get('warning')}}
	</div>
@endif

@if(Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>Info :</strong> {{ Session::get('danger')}}
	</div>
@endif

@if (count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
	</div>
@endif