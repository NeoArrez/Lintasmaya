@extends('app')

@section('title', '| Karyawan')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-10">
			<h1>Data Karyawan</h1>
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			<a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-md" style='margin-bottom: 10px'>
				Tambah Karyawan
			</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

		<table class="table table-striped" style="font-size:12px;">
		  	<thead>
		  		<th class="col-md-1">NIP</th>
		  		<th class="col-md-1">Nama Lengkap</th>
		  		<th class="col-md-2">Alamat</th>
		  		<th class="col-md-1">Email</th>
		  		<th class="col-md-1">HP</th>
		  		<th class="col-md-1">Jabatan</th>
		  		<th class="col-md-1">Keterangan</th>
		  		<th class="col-md-1"> </th>
		  	</thead>
		  	<tbody>
		  		@foreach($karyawans as $karyawan)
		  			<tr>
		  				<th>{{$karyawan->NIP}}</th>
		  				<td>{{$karyawan->NamaLengkap}}</td>
		  				<td>{{$karyawan->Alamat}}</td>
		  				<td>{{$karyawan->Email}}</td>
		  				<td>{{$karyawan->HP}}</td>
		  				<td>{{$karyawan->Jabatan}}</td>
		  				<td>{{$karyawan->Keterangan}}</td>
		  				<td>

{{-- 							<a href="{{ route('karyawan.show',$karyawan->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
		  					</a> --}}
		  					<a href="{{ route('karyawan.edit',$karyawan->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  					<div class="btn btn-sm btndel">
			  					{!! Form::Open(['route' => ['karyawan.destroy', $karyawan->id], 'method' => 'DELETE']) !!}


					    			{!! Form::Button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-warning btn-sm']) !!}

			  					{!! Form::Close() !!}
		  					</div	>

		  				</td>
		  			</tr>
		  		@endforeach
		  	</tbody>
		</table>
		<div class="text-center">
			{!! $karyawans->render(); !!}
		</div>
	</div>
	<div class="row">

		<h4>Karyawan Non Aktif</h4>

		<table class="table table-striped" style="font-size:12px;">
		  	<thead>
		  		<th class="col-md-1" >NIP</th>
		  		<th class="col-md-1">Nama Lengkap</th>
		  		<th class="col-md-2">Alamat</th>
		  		<th class="col-md-1">Email</th>
		  		<th class="col-md-1">HP</th>
		  		<th class="col-md-1">Jabatan</th>
		  		<th class="col-md-2">Keterangan</th>
		  		<th class="col-md-1"> </th>
		  	</thead>
		  	<tbody>
		  		@foreach($nonaktif as $karyawan)
		  			<tr>
		  				<th>{{$karyawan->NIP}}</th>
		  				<td>{{$karyawan->NamaLengkap}}</td>
		  				<td>{{$karyawan->Alamat}}</td>
		  				<td>{{$karyawan->Email}}</td>
		  				<td>{{$karyawan->HP}}</td>
		  				<td>{{$karyawan->Jabatan}}</td>		  				
						<td>
							@if ($karyawan->deleted_at != NULL)
								nonaktif sejak : <br>
								{{ date('d F Y', strtotime($karyawan->deleted_at)) }} <br>
								{{ date('H:i:s', strtotime($karyawan->deleted_at)) }}
							@endif
						</td>	
		  				<td>	
		  					<a href="{{ route('karyawan.restore',$karyawan->id) }}" class="btn btn-primary btn-sm">
		  						<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
		  					</a>

		  					<a href="{{ route('karyawan.delete',$karyawan->id) }}" class="btn btn-danger btn-sm">
		  						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		  					</a>

		  				</td>
		  			</tr>
		  		@endforeach
		  	</tbody>
		</table>
	</div>
</div>
@endsection
@section('javascripts')
	
@endsection