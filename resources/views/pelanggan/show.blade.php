@extends('app')

@section('title', '| Karyawan')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-8">
			<h1>Data Karyawan Baru</h1>
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			{!! Html::linkRoute('karyawan.create', 'Tambah Karyawan', [$karyawan->id],['class'=>'btn btn-primary btn-md', 'style'=>'margin-bottom: 10px'])!!}
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			{!! Html::linkRoute('karyawan.edit', 'Edit Data Karyawan', [$karyawan->id],['class'=>'btn btn-primary btn-md', 'style'=>'margin-bottom: 10px'])!!}
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

			<table class="table table-striped" style="font-size:12px;">
			  	<thead>
			  		<th class="col-md-1" >NIP</th>
			  		<th class="col-md-1">Nama Lengkap</th>
			  		<th class="col-md-2">Alamat</th>
			  		<th class="col-md-1">Email</th>
			  		<th class="col-md-1">HP</th>
			  		<th class="col-md-1">Jabatan</th>
			  		<th class="col-md-1">Keterangan</th>
			  		<th class="col-md-1"> </th>
			  	</thead>
			  	<tbody>
		  			<tr>
		  				<th>{{$karyawan->NIP}}</th>
		  				<td>{{$karyawan->NamaLengkap}}</td>
		  				<td>{{$karyawan->Alamat}}</td>
		  				<td>{{$karyawan->Email}}</td>
		  				<td>{{$karyawan->HP}}</td>
		  				<td>{{$karyawan->Jabatan}}</td>
		  				<td>{{$karyawan->Keterangan}}</td>
		  				<td>
		  					<a href="{{ route('karyawan.show',$karyawan->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
		  					</a>
		  					<a href="{{ route('karyawan.edit',$karyawan->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  				</td>
		  			</tr>
			  	</tbody>
			</table>
	</div>
</div>
@endsection
@section('javascripts')
	
@endsection