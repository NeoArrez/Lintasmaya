@extends('app')

@section('title', '| Invoice')

@section('stylesheets')	
@endsection

@section('content')
<div class="container">
	<div class="col-md-2 col-md-offset-10">

	</div>

	<div class="row">
		{!! Form::model($invoice,['route' => ['invoice.update',$invoice->id], 'method' => 'PUT','class' => 'form-horizontal']) !!}

			<div class="row">
				<h3>Transaksi Pembayaran</h3>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<div class="col-md-4">
				    	{!! Form::label('NoInvoice', 'Kode Invoice') !!}
					</div>
					<div class="col-md-8">
				    	{!! Form::text('NoInvoice', $invoice->NoInvoice, ['class'=>'form-control','disabled'=>'disabled']) !!}
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
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('Bulanan', 'Tagihan') !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('Bulanan', null, ['class'=>'form-control','style'=>'text-align:right;','disabled'=>'disabled']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('Potongan', 'Diskon') !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('Potongan', null, ['class'=>'form-control','style'=>'text-align:right;','disabled'=>'disabled']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('PPN', 'PPN') !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('PPN', null, ['class'=>'form-control','style'=>'text-align:right;','disabled'=>'disabled']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('Total', 'Total Tagihan') !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('Total', null, ['class'=>'form-control','style'=>'text-align:right;','disabled'=>'disabled']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('CaraBayar', 'Cara Bayar') !!}
					</div>
					<div class="col-md-6">
						{!! Form::select('CaraBayar',['Cash' => 'Cash', 'Transfer' => 'Transfer'], 'Cash', ['class'=>'form-control selector caraselector']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						{!! Form::label('TglBayar', 'Tanggal Bayar') !!}
					</div>
					<div class="col-md-6">
						{!! Form::text('TglBayar', Carbon\carbon::now()->format('d M Y'), ['class'=>'form-control','id'=>'datepicker', 'style'=>'text-align:center;']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group well">
					{!! Form::label('Keterangan', 'Keterangan') !!}
					{!! Form::textarea('Keterangan', null, ['class'=>'form-control','style'=>'text-align:left;']) !!}
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
@endsection

@section('javascripts')

@endsection