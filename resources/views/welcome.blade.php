
@extends('appwelcome')

@section('title', '| Welcome')

@section('content')
	<div id='sect1' class="col-md-7">
		<h1 class="companyname1">LINTASMAYA</h1>
		<h6 class="companyname2">NUSANTARA NETWORK</h6>
	</div>
	<div id='sect2' class="col-md-5">
		@include('partial._guestnav')
	</div>
		<div id='sect3' class="col-md-6">
	</div>
	<div id='sect4' class="col-md-5 col-md-offset-1">
		<div class="col-md-10 col-md-offset-2">
			<h4 style="text-align: right;">OFFICE : JL. CENDANA GANG 4 NO 24 SAMARINDA, KALIMANTAN TIMUR</h4>
		</div>	
	</div>
@endsection

@section('javascripts')
	
@endsection