@extends('app')

@section('title', '| User')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-10">
			<h1>Data User</h1>
		</div>

		<div class="col-md-2" style="margin-top: 20px;">
			<a href="{{ route('user.create') }}" class="btn btn-primary btn-md" style='margin-bottom: 10px'>
				Tambah User
			</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

		<table class="table table-striped" style="font-size:12px;">
		  	<thead>
		  		<th class="col-md-1">Username</th>
		  		<th class="col-md-1">Nama Lengkap</th>
		  		<th class="col-md-2">Email</th>
		  		<th class="col-md-2">Password</th>
		  		<th class="col-md-1"> </th>
		  	</thead>
		  	<tbody>
		  		@foreach($users as $user)
		  			<tr>
		  				<th>{{$user->name}}</th>
		  				<td>{{$user->NamaLengkap}}</td>
		  				<td>{{$user->email}}</td>
		  				<td>{{$user->password}}</td>
		  				<td>

{{-- 							<a href="{{ route('user.show',$user->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
		  					</a> --}}
		  					<a href="{{ route('user.edit',$user->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  					<div class="btn btn-sm btndel">
			  					{!! Form::Open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}


					    			{!! Form::Button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-warning btn-sm']) !!}

			  					{!! Form::Close() !!}
		  					</div	>

		  				</td>
		  			</tr>
		  		@endforeach
		  	</tbody>
		</table>
		<div class="text-center">
			{!! $users->render(); !!}
		</div>
	</div>
	<div class="row">

			<h4>User Non Aktif</h4>

			<table class="table table-striped" style="font-size:12px;">
			  	<thead>
			  		<th class="col-md-1">Username</th>
			  		<th class="col-md-1">Nama Lengkap</th>
			  		<th class="col-md-2">Email</th>
		  			<th class="col-md-2">Password</th>
			  		<th class="col-md-1"> </th>
			  	</thead>
			  	<tbody>
			  		@foreach($nonaktif as $user)
			  			<tr>
			  				<th>{{$user->name}}</th>
			  				<td>{{$user->NamaLengkap}}</td>
			  				<td>{{$user->email}}</td>
		  					<td>{{$user->password}}</td>				
							<td>
								@if ($user->deleted_at != NULL)
									nonaktif sejak : <br>
									{{ date('d F Y', strtotime($user->deleted_at)) }} <br>
									{{ date('H:i:s', strtotime($user->deleted_at)) }}
								@endif
							</td>	
			  				<td>	
			  					<a href="{{ route('user.restore',$user->id) }}" class="btn btn-primary btn-sm">
			  						<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
			  					</a>

			  					<a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger btn-sm">
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