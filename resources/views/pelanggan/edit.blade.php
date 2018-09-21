@extends('app')

@section('title', '| Pelanggan')

@section('stylesheets')	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 col-md-offset-10">

		</div>


		<div class="col-md-12">
			{!! Form::model($pelanggan,['route' => ['pelanggan.update',$pelanggan->id], 'method' => 'PUT']) !!}
	
				<div class="col-md-4">
					<div class="row">
						<h3>Info Perusahaan</h3>
					</div>
					    {!! Form::label('NamaPerusahaan', 'Nama Perusahaan') !!}
					    {!! Form::text('NamaPerusahaan', null, ['class'=>'form-control']) !!}
						{!! Form::label('Alamat', 'Alamat') !!}
						{!! Form::textarea('Alamat', null, ['class'=>'form-control','style'=>'height:90px;']) !!}
					    {!! Form::label('Kota', 'Kota') !!}
					    {!! Form::text('Kota', null, ['class'=>'form-control']) !!}
					    {!! Form::label('Email', 'Email') !!}
					    {!! Form::email('Email', null, ['class'=>'form-control']) !!}
						{!! Form::label('Telepon', 'Telepon') !!}
						{!! Form::text('Telepon', null, ['class'=>'form-control']) !!}
						{!! Form::label('NPWP', 'NPWP') !!}
						{!! Form::text('NPWP', null, ['class'=>'form-control']) !!}	
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<h3>Info Paket</h3>
						</div>
					</div>
					<div class="col-md-8">
						{!! Form::label('Paket', 'Paket') !!}
						{!! Form::text('Paket', null, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('Password', 'Password') !!}
						{!! Form::text('Password', null, ['class'=>'form-control']) !!}
					</div>
					<div class="col-md-3">
						{!! Form::label('Bulanan', 'Bulanan') !!}
						{!! Form::text('Bulanan', null, ['class'=>'form-control','style'=>'text-align:right;']) !!}
					</div>
					<div class="col-md-3">
						{!! Form::label('TglAktivasi', 'Tgl Aktivasi') !!}
						{!! Form::text('TglAktivasi', $pelanggan->TglAktivasi->format('d M Y'), ['class'=>'form-control','id'=>'datepicker', 'style'=>'text-align:center;']) !!}
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3>Info Tekhnis</h3>
						</div>
					</div>
					<div class="col-sm-4">
						{!! Form::label('IPComputer', 'IP Computer') !!}
						{!! Form::text('IPComputer', null, ['class'=>'form-control']) !!}
					</div>
					<div class="col-sm-4">
						{!! Form::label('NamaBTS', 'BTS') !!}
						{!! Form::select('NamaBTS',$btslists, null, ['class'=>'form-control selector btsselector','data-id'=>$pelanggan->BTS]) !!}
					</div>
					<div class="col-sm-12">
						{!! Form::label('Keterangan', 'Keterangan') !!}
						{!! Form::text('Keterangan', null, ['class'=>'form-control','style'=>'height:90px;']) !!}
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-lg btn-block" style='margin-top: 10px'>
								Cancel
							</a>
						</div>
						<div class="col-md-4">
				    		{!! Form::submit ('Simpan Perubahan', ['id'=>'btnSubmit','class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px;']) !!}
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