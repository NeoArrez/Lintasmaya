@extends('app')

@section('title', '| Pelanggan')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1>Data Pelanggan</h1>
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			<a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-md" style='margin-bottom: 10px'>
				Tambah Pelanggan
			</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

		<table class="table table-striped">
		  	<thead>
		  		<th class="">Kode</th>
		  		<th class="">Nama Perusahaan</th>
		  		<th class="">Alamat</th>
		  		<th class="">Email</th>
		  		<th class="">Paket</th>
		  		<th class="">(Bulanan)</th>
		  		<th class="">Telepon</th>
		  		<th class="">IP Computer</th>
		  		<th class="">NPWP</th>
		  		<th class=""></th>
		  	</thead>
		  	<tbody>
		  		@foreach($pelanggans as $pelanggan)
		  			<tr>
		  				<th>{{ $pelanggan->id }}</th>
		  				<td>{{ $pelanggan->NamaPerusahaan }}</td>
		  				<td>{{ $pelanggan->Alamat }}</td>
		  				<td>{{ $pelanggan->Email }}</td>
		  				<td>{{ $pelanggan->Paket }}</td>
		  				<td>{{ number_format($pelanggan->Bulanan, 0, ',', '.') }}</td>
		  				<td>{{ $pelanggan->Telepon }}</td>
		  				<td>{{ $pelanggan->IPComputer }}</td>
		  				<td>{{ $pelanggan->NPWP }}</td>
		  				<td>
		  					<a href="{{ route('pelanggan.edit',$pelanggan->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  					<a href="{{ route('pelanggan.show',$pelanggan->id) }}" target ="_blank" class="btn btn-primary btn-sm">
		  						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		  					</a>

		  					<div class="btn btn-sm btndel">
			  					{!! Form::Open(['route' => ['pelanggan.destroy', $pelanggan->id], 'method' => 'DELETE']) !!}


					    			{!! Form::Button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-warning btn-sm']) !!}

			  					{!! Form::Close() !!}
		  					</div	>

		  				</td>
		  			</tr>
		  		@endforeach
		  	</tbody>
		</table>
		<div class="text-center">
			{!! $pelanggans->render(); !!}
		</div>
	</div>
	<div class="row">

			<h4>Pelanggan Non Aktif</h4>

			<table class="table table-striped">
			  	<thead>
			  		<th class="">Kode</th>
			  		<th class="">Nama Perusahaan</th>
			  		<th class="">Alamat</th>
			  		<th class="">Email</th>
			  		<th class="">Paket</th>
			  		<th class="">(Bulanan)</th>
			  		<th class="">Telepon</th>
			  		<th class="">IP Computer</th>
			  		<th class="">NPWP</th>
			  		<th class="">Keterangan</th>
			  	</thead>
			  	<tbody>
			  		@foreach($nonaktif as $pelanggan)
			  			<tr>
			  				<th>{{ $pelanggan->id }}</th>
			  				<td>{{ $pelanggan->NamaPerusahaan }}</td>
			  				<td>{{ $pelanggan->Alamat }}</td>
			  				<td>{{ $pelanggan->Email }}</td>
			  				<td>{{ $pelanggan->Paket }}</td>
			  				<td>{{ number_format($pelanggan->Bulanan, 0, ',', '.') }}</td>
			  				<td>{{ $pelanggan->Telepon }}</td>
			  				<td>{{ $pelanggan->IPComputer }}</td>
			  				<td>{{ $pelanggan->NPWP }}</td>	  				
							<td>
								@if ($pelanggan->deleted_at != NULL)
									nonaktif sejak : <br>
									{{ date('d F Y', strtotime($pelanggan->deleted_at)) }} <br>
									{{ date('H:i:s', strtotime($pelanggan->deleted_at)) }}
								@endif
							</td>	
			  				<td>	
			  					<a href="{{ route('pelanggan.restore',$pelanggan->id) }}" class="btn btn-primary btn-sm">
			  						<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
			  					</a>

			  					<a href="{{ route('pelanggan.delete',$pelanggan->id) }}" class="btn btn-danger btn-sm">
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