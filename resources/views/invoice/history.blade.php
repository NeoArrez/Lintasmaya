@extends('app')

@section('title', '| Invoice')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="col-md-9">

		<div class="col-md-10">
			<h1>Data Invoice</h1>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">

		<table class="table table-striped">
		  	<thead>
		  		<th class="">No</th>
		  		<th class="">No Invoice</th>
		  		<th class="">ID</th>
		  		<th class="">Nama Pelanggan</th>
		  		<th class="">Paket</th>
		  		<th class="">Periode</th>
		  		<th class="">Jumlah</th>
		  		<th class="">Potongan</th>
		  		<th class="">PPN</th>
		  		<th class="">Total</th>
		  		<th class="">Status</th>
		  		<th class="">Tgl Bayar</th>
		  	</thead>
		  	<tbody id="InvcData">
		  			<tr>{{-- 
		  				<th scope="row">{{ ++$key }}</th>
		  				<td>{{ $invoice->NoInvoice }}</td>
		  				<td>{{ $invoice->IDPerusahaan }}</td>
		  				<td>{{ $invoice->NamaPerusahaan }}</td>
		  				<td>{{ $invoice->Paket }}</td>
		  				<td>{{ $invoice->Periode }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Bulanan, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Potongan, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->PPN, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Total, 0, ',', '.') }}</td>
		  				<td>{{ $invoice->Status }}</td>
		  				<td>{{ $invoice->TglBayar }}</td> --}}
		  			</tr>
		  	</tbody>
		</table>
		  	
		<div class="text-center">
			{{-- {!! $invoices->render(); !!} --}}
		</div>
	</div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript">
</script>

@endsection