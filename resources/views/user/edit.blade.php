@extends('applogin')

@section('title', '| User')

@section('stylesheets')	
@endsection

@section('content')
<div class="container-fluid">

	<div class="col-md-1 col-md-offset-11">
		<a href="{{ route('user.index') }}" class="btn btn-lg btn-block" style='margin-top: 10px'>
			Kembali
		</a>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 loginpanel">
			<div class="panel panel-default">
				<div class="panel-heading">Edit User</div>
				<div class="panel-body">
					{!! Form::model($user,['route' => ['user.update',$user->id], 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
					
						<div class="form-group">
						    {!! Form::label('name', 'Username',['class'=>'col-md-4 control-label']) !!}
						    <div class="col-md-6">
						    	{!! Form::text('name', null, ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
						    {!! Form::label('NamaLengkap', 'Nama Lengkap',['class'=>'col-md-4 control-label']) !!}
						    <div class="col-md-6">
						    	{!! Form::text('NamaLengkap', null, ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('email', 'E-Mail Address',['class'=>'col-md-4 control-label']) !!}
						    <div class="col-md-6">
								{!! Form::text('email', null, ['class'=>'form-control','type'=>'email']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password', 'Password',['class'=>'col-md-4 control-label']) !!}
						    <div class="col-md-6">
								{!! Form::password('password', ['class'=>'form-control','type'=>'password']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password_confirmation', 'Confirm Password',['class'=>'col-md-4 control-label']) !!}
						    <div class="col-md-6">
								{!! Form::password('password_confirmation', ['class'=>'form-control','type'=>'password']) !!}
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
					    		{!! Form::submit ('Simpan Perubahan', ['class'=>'btn btn-primary']) !!}
					    	</div>
				    	</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascripts')
	
@endsection