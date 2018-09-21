@extends('app')

@section('title', '| BTS')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-10">
			<h1>Data BTS</h1>
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			<a href="{{ route('bts.create') }}" class="btn btn-primary btn-md" style='margin-bottom: 10px'>
				Tambah BTS
			</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

		<table class="table table-striped" style="font-size:12px;">
		  	<thead>
		  		<th class="col-md-1">Kode</th>
		  		<th class="col-md-2">Nama BTS</th>
		  		<th class="col-md-2">Keterangan</th>
		  		<th class="col-md-1"> </th>

		  	</thead>
		  	<tbody>
		  		@foreach($btss as $bts)
		  			<tr>
		  				<th>{{ $bts->id }}</th>
		  				<td>{{ $bts->NamaBTS }}</td>
		  				<td>{{ $bts->Keterangan }}</td>
		  				<td style="padding-top: 3px">
		  					<a href="{{ route('bts.edit',$bts->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  					<div class="btn btn-sm btndel">
			  					{!! Form::Open(['route' => ['bts.destroy', $bts->id], 'method' => 'DELETE']) !!}


					    			{!! Form::Button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-warning btn-sm']) !!}

			  					{!! Form::Close() !!}
		  					</div	>

		  				</td>
		  			</tr>
		  		@endforeach
		  	</tbody>
		</table>
		<div class="text-center">
			{!! $btss->render(); !!}
		</div>
	</div>
	<div class="row">

			<h4>BTS Non Aktif</h4>

			<table class="table table-striped" style="font-size:12px;">
			  	<thead>
			  		<th class="col-md-1">Kode</th>
			  		<th class="col-md-2">Nama BTS</th>
			  		<th class="col-md-2">Keterangan</th>
			  		<th class="col-md-1"> </th>
			  	</thead>
			  	<tbody>
			  		@foreach($nonaktif as $bts)
			  			<tr>
			  				<th>{{ $bts->id }}</th>
		  					<td>{{ $bts->NamaBTS }}</td>
		  					<td>{{ $bts->Keterangan }}</td>		
							<td>
								@if ($bts->deleted_at != NULL)
									nonaktif sejak : <br>
									{{ date('d F Y', strtotime($bts->deleted_at)) }} <br>
									{{ date('H:i:s', strtotime($bts->deleted_at)) }}
								@endif
							</td>	
			  				<td>	
			  					<a href="{{ route('bts.restore',$bts->id) }}" class="btn btn-primary btn-sm">
			  						<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
			  					</a>

			  					<a href="{{ route('bts.delete',$bts->id) }}" class="btn btn-danger btn-sm">
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