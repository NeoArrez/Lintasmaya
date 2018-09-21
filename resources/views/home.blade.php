@extends('app')

@section('title', '| Home')

@section('stylesheets')
	<link href="css/custom.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container" style="height:75vh">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<h1>Selamat Datang</h1>
			<div>
				<h5><strong>{{ ucwords(Auth::user()->name) }}</strong>, anda berada di halaman awal Program Invoice Pelanggan ISP</h5>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascripts')
	
@endsection
