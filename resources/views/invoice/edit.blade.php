@extends('app')

@section('title', '| Invoice')

@section('stylesheets')	
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 col-md-offset-10">

		</div>

		<div class="col-md-12">
			{!! Form::model($invoice,['route' => ['invoice.update',$invoice->id], 'method' => 'PUT','class' => 'form-horizontal']) !!}
	

				<div class="row">
					<h3>Info Perusahaan</h3>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-4">
					    	{!! Form::label('NoInvoice', 'Invoice Bulan') !!}
						</div>
						<div class="col-md-8">
					    	{!! Form::text('NoInvoice', substr($invoice->NoInvoice,-7), ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
					    	{!! Form::label('IDPerusahaan', 'ID Pelanggan') !!}
						</div>
						<div class="col-md-8">
					    	{!! Form::text('IDPerusahaan', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
					    	{!! Form::label('NamaPerusahaan', 'Nama Pelanggan') !!}
						</div>
						<div class="col-md-8">
					    	{!! Form::text('NamaPerusahaan', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Alamat', 'Alamat') !!}
						</div>
						<div class="col-md-8">
							{!! Form::text('Alamat', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Telepon', 'Telepon') !!}
						</div>
						<div class="col-md-8">
							{!! Form::text('Telepon', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
					    	{!! Form::label('Email', 'Email') !!}
						</div>
						<div class="col-md-8">
					    	{!! Form::email('Email', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Paket', 'Paket') !!}
						</div>
						<div class="col-md-8">
							{!! Form::text('Paket', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Periode', 'Periode Akses') !!}
						</div>
						<div class="col-md-6">
							{!! Form::text('Periode', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('TglInvoice', 'Tanggal Invoice') !!}
						</div>
						<div class="col-md-4">
							{!! Form::text('TglInvoice', $invoice->TglInvoice->format('d M Y'), ['class'=>'form-control','id'=>'datepicker', 'style'=>'text-align:center;']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('TglJatuhTempo', 'Jatuh Tempo') !!}
						</div>
						<div class="col-md-4">
							{!! Form::text('TglJatuhTempo', $invoice->TglJatuhTempo->format('d M Y'), ['class'=>'form-control','id'=>'datepicker2', 'style'=>'text-align:center;']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Bulanan', 'Bulanan') !!}
						</div>
						<div class="col-md-4">
							{!! Form::text('Bulanan', null, ['class'=>'form-control','style'=>'text-align:right;']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							{!! Form::label('Potongan', 'Potongan') !!}
						</div>
						<div class="col-md-4">
							{!! Form::text('Potongan', null, ['class'=>'form-control','style'=>'text-align:right;']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
				    		{!! Form::submit ('Simpan Perubahan', ['id'=>'btnSubmit','class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px;']) !!}
				    	</div>
						<div class="col-md-2">
							<a href="{{ route('invoice.index') }}" class="btn btn-primary btn-lg btn-block" style='margin-top: 10px'>
								Cancel
							</a>
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