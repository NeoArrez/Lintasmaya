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
			{!! Form::model($bts,['route' => ['bts.update',$bts->id], 'method' => 'PUT']) !!}
				<div class="col-md-4">
					<div class="row">
						<h3>Info BTS</h3>
					</div>
					<div class="row">
					    {!! Form::label('NamaBTS', 'Nama BTS') !!}
					    {!! Form::text('NamaBTS', null, ['class'=>'form-control','style'=>'width:240px;']) !!}
						{!! Form::label('Keterangan', 'Keterangan') !!}
						{!! Form::textarea('Keterangan', null, ['class'=>'form-control','style'=>'height:100px;']) !!}	
					</div>

					<div class="row">
						<div class="col-md-5">
							<a href="{{ route('bts.index') }}" class="btn btn-primary btn-lg btn-block" style='margin-top: 10px'>
								Cancel
							</a>
						</div>
						<div class="col-md-7">
				    		{!! Form::submit ('Simpan Perubahan', ['class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px;']) !!}
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