@extends('app')

@section('title', '| Invoice')

@section('stylesheets')
@endsection

@section('content')
<div class="container">
	<div class="col-md-9">
{{-- 		{{$icount}} --}}
		{!! Form::open(['method'=>'GET','url'=>'invoice','class'=>'navbar-form navbar-left','role'=>'search', 'name'=>'searchForm'])  !!}
			
			 
			<div class="col-md-2" style="width:150px;" id='MonthInvc' name='MonthInvc'></div>
			<div class="col-md-2" style="width:110px;" id='YearInvc' name='YearInvc'></div>
			<div class="col-md-2">
    			{!! Form::Button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	<div class="col-md-3">
		{!! Form::open(['route' => 'invoice.store']) !!}
		    {!! Form::submit ('Generate Invoice', ['class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:10px;']) !!}
		{!! Form::close() !!}
	</div>
	<div class="row">

		<div class="col-md-10">
			<h1>Data Invoice</h1>
{{-- 			{{$ocount}}
			{{$icount}}
			{{$acount}} --}}

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
{{-- 		  		<th class="">Tgl Invoice</th>
		  		<th class="">Jatuh Tempo</th> --}}
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
		  		<th class=""></th>
		  	</thead>
		  	<tbody id="InvcData">
		  		@foreach($invoices as $key => $invoice)
		  			<tr>
		  				<th scope="row">{{ ++$key }}</th>
		  				<td>{{ $invoice->NoInvoice }}</td>
{{-- 		  				<th>{{ $invoice->TglInvoice }}</td>
		  				<td>{{ $invoice->TglJatuhTempo }}</td> --}}
		  				<td id="naper">{{ $invoice->IDPerusahaan }}</td>
		  				<td>{{ $invoice->NamaPerusahaan }}</td>
		  				<td>{{ $invoice->Paket }}</td>
		  				<td>{{ $invoice->Periode }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Bulanan, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Potongan, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->PPN, 0, ',', '.') }}</td>
		  				<td style="text-align:right;">{{ number_format($invoice->Total, 0, ',', '.') }}</td>
		  				<td id="StatusBayar">{{ $invoice->Status }}</td>
		  				<td>{{ $invoice->TglBayar }}</td>
		  				<td>
		  					<a href="{{ route('invoice.edit',$invoice->id) }}" class="btn btn-success btn-sm">
		  						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		  					</a>

		  					<a href="{{ route('invoice.show',$invoice->id) }}" target ="_blank" class="btn btn-primary btn-sm">
		  						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		  					</a>

		  					<div class="btn btn-sm btndel">
			  					{!! Form::Open(['route' => ['invoice.destroy', $invoice->id], 'method' => 'DELETE']) !!}

					    			{!! Form::Button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type'=> 'submit','class'=>'btn btn-warning btn-sm']) !!}

			  					{!! Form::Close() !!}
		  					</div>
		  					@if($invoice->TglBayar == "0000-00-00")
			  					<a href="{{ route('invoice.bayar',$invoice->id) }}" class="btn btn-primary btn-block">
			  						<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			  					</a>
		  					@endif
		  				</td>
		  			</tr>
		  		@endforeach
	  				<th scope="row">Total</th>
	  				<th></th>
{{-- 		  				<th>{{ $invoice->TglInvoice }}</th>
	  				<th>{{ $invoice->TglJatuhTempo }}</th> --}}
	  				<th></th>
	  				<th></th>
	  				<th></th>
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
		  	
		<div class="text-center">
			{!! $invoices->render(); !!}
		</div>
		<table width="15%" border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
		    <th>Keterangan</th>
		    <th align="right">&nbsp;</th>
		  </tr>
		  <tr>
		    <td>Invoice Lunas</td>
		    <td align="right">{{ number_format($TLunas, 0, ',', '.') }}</td>
		  </tr>
		  <tr>
		    <td>Invoice Belum Lunas</td>
		    <td align="right">{{ number_format($TBelum, 0, ',', '.') }}</td>
		  </tr>
		  <tr>
		    <td>Total Invoice</td>
		    <td align="right">{{ number_format($TTotal, 0, ',', '.') }}</td>
		  </tr>
		    <tr>
		    <td>Total PPN</td>
		    <td align="right">{{ number_format($TPPN, 0, ',', '.') }}</td>
		  </tr>
		</tbody></table>
	</div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript">
	    var SelMonth = {!! json_encode($SelMonth) !!};
	    var SelYear = {!! json_encode($SelYear) !!};
</script>

@endsection