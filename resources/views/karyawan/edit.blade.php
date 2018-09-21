@extends('app')

@section('title', '| Karyawan')

@section('stylesheets')	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 col-md-offset-10">

		</div>


		<div class="col-md-12">
			{!! Form::model($karyawan,['route' => ['karyawan.update',$karyawan->id], 'method' => 'PUT']) !!}
	
				<div class="col-md-4">
				    {!! Form::label('NIP', 'Nomor Induk Pegawai') !!}
				    {!! Form::text('NIP', null, ['class'=>'form-control','style'=>'width:240px;','maxlength' => 25]) !!}
				    {!! Form::label('NamaLengkap', 'Nama Lengkap') !!}
				    {!! Form::text('NamaLengkap', null, ['class'=>'form-control']) !!}
					{!! Form::label('Alamat', 'Alamat') !!}
					{!! Form::textarea('Alamat', null, ['class'=>'form-control','style'=>'height:100px;']) !!}
		    							
				</div>
				<div class="col-md-8">
					<div class="col-md-12">
						<div class="col-md-5">
							{!! Form::label('Email', 'Email') !!}
							{!! Form::text('Email', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-md-3">
							{!! Form::label('HP', 'HP') !!}
							{!! Form::text('HP', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::label('Jabatan', 'Jabatan') !!}
							{!! Form::text('Jabatan', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-sm-12">
							{!! Form::label('Keterangan', 'Keterangan') !!}
							{!! Form::textarea('Keterangan', null, ['class'=>'form-control','style'=>'height:100px;']) !!}
						</div>
						<div class="col-md-2">
  							<button type="button" class="btn btn-primary minusbtn">-</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<a href="{{ route('karyawan.index') }}" class="btn btn-primary btn-lg btn-block" style='margin-top: 10px'>
								Cancel
							</a>
						</div>
						<div class="col-md-5">
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