@extends('app')

@section('title', '| BTS')

@section('stylesheets')	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 col-md-offset-10">

		</div>


		<div class="col-md-12">
			{!! Form::open(['route' => 'bts.store']) !!}

				<div class="col-md-4">
					<div class="row">
						<h3>Info BTS</h3>
					</div>
					<div class="row">
					    {!! Form::label('NamaBTS', 'Nama BTS') !!}
					    {!! Form::text('NamaBTS', null, ['class'=>'form-control']) !!}
						{!! Form::label('Keterangan', 'Keterangan') !!}
						{!! Form::text('Keterangan', null, ['class'=>'form-control','style'=>'height:90px;']) !!}
					</div>

					<div class="row">
						<div class="col-md-6">

							<a href="{{ route('bts.index') }}" class="btn btn-warning btn-lg btn-block" style='margin-top: 10px'>
								Cancel
							</a>

						</div>
						<div class="col-md-6">
				    		{!! Form::submit ('Tambahkan BTS', ['class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px;']) !!}
				    	</div>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('javascripts')
	
@endsection