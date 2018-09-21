@extends('app')

@section('title', '| Invoice')

@section('stylesheets')
@endsection

@section('content')
<div class="container">

	<div class="col-md-6 col-md-offset-3">

			<div class="col-md-4">
				<div>
					<h5 class="">ID</h5>
				</div>
				<div>
					<h5 class="">Nama Pelanggan</h5>
				</div>
				<div>
					<h5 class="">Alamat</h5>
				</div>
			</div>
			<div class="col-md-8">
				<div>
  					<h5>: {{ $singleData->IDPerusahaan }}</h5>
				</div>
				<div>
  					<h5>: {{ $singleData->NamaPerusahaan }}</h5>
				</div>
				<div>
  					<h5>: {{ $singleData->Alamat }}</h5>
				</div>
			</div>
			<div class="row">
				<br>
			</div>
			<table class="table table-striped" style="font-size:12px;">
			  	<thead>
			  		<th class="">No</th>
			  		<th class="">No Invoice</th>
			  		<th class="">Jumlah</th>
			  		<th class="">Potongan</th>
			  		<th class="">PPN</th>
			  		<th class="">Total</th>
			  		<th class="">Status</th>
			  		<th class="">Tgl Bayar</th>
			  		<th class=""></th>
			  	</thead>
			  	<tbody>
			  		@foreach($invoices as $key => $invoice)
			  			<tr>
			  				<th scope="row">{{ ++$key }}</th>
			  				<td>{{ $invoice->NoInvoice }}</td>
			  				<td style="text-align:right;">{{ number_format($invoice->Bulanan, 0, ',', '.') }}</td>
			  				<td style="text-align:right;">{{ number_format($invoice->Potongan, 0, ',', '.') }}</td>
			  				<td style="text-align:right;">{{ number_format($invoice->PPN, 0, ',', '.') }}</td>
			  				<td style="text-align:right;">{{ number_format($invoice->Total, 0, ',', '.') }}</td>
			  				<td>{{ $invoice->Status }}</td>
			  				<td>{{ $invoice->TglBayar }}</td>
			  				<td></td>
			  			</tr>
			  		@endforeach
		  				<th scope="row">Total</th>
		  				<th></th>
		  				<th style="text-align:right;">{{ number_format($TBulanan, 0, ',', '.') }}</th>
		  				<th style="text-align:right;">{{ number_format($TPotongan, 0, ',', '.') }}</th>
		  				<th style="text-align:right;">{{ number_format($TPPN, 0, ',', '.') }}</th>
		  				<th style="text-align:right;">{{ number_format($TTotal, 0, ',', '.') }}</th>
		  				<th></th>
		  				<th></th>
		  				<th></td>
			  	</tbody>
			</table>
	</div>
</div>
@endsection
@section('javascripts')
	
@endsection