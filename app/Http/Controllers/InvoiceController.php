<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Invoice;
use App\Pelanggan;
use App\BTS;
use Session;
use Carbon\Carbon;

class InvoiceController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $SelYear = \Request::get('SelYear');
	    $SelMonth = \Request::get('SelMonth'); //<-- we use global request to get the param of URI
	 	
	 	if ($SelYear==null){
	 		$SelYear=carbon::now()->format("Y");
	 	}

	 	if ($SelMonth==null){
	 		$SelMonth=carbon::now()->format("n");
	 	}

		// $datas = Pelanggan::all();
		// $ocount = count($datas);

		// $NewInvc =  DB::table('invoices') //DB::table('Invoices')
		// 				->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
		// 				->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
		// 				->get();
		// $icount = count($NewInvc);

		// $acount = count($datas)-count($NewInvc);

		$pelanggans = DB::table('pelanggans')
						->paginate(3);

		$invoices = DB::table('invoices') //DB::table('Invoices')
						->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
						->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
						->paginate(3);

		$dcount = count($invoices);

		if($dcount != 0){
			$TBulanan = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->sum('Bulanan');

			$TPotongan = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->sum('Potongan');

			$TPPN = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->sum('PPN');

			$TTotal = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->sum('Total');

			$TLunas = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->where("Status","=","Lunas")
							->sum('Total');

			$TBelum = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".$SelYear)
							->whereRaw("substr(NoInvoice, -7,2) = ".$SelMonth)
							->where("Status","=","Belum")
							->sum('Total');
		}else{
			$TBulanan =0;
			$TPotongan =0;
			$TPPN =0;
			$TTotal =0;
		}

		return view ('invoice.index',['invoices'=>$invoices,'SelYear'=>$SelYear,'SelMonth'=>$SelMonth,'TBulanan'=>$TBulanan,'TPotongan'=>$TPotongan,'TPPN'=>$TPPN,'TTotal'=>$TTotal,'TLunas'=>$TLunas,'TBelum'=>$TBelum]);
		// return view ('invoice.index',['invoices'=>$invoices,'SelYear'=>$SelYear,'SelMonth'=>$SelMonth,'ocount'=>$ocount,'icount'=>$icount,'acount'=>$acount]);
	    //return view('offices.index',compact('offices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $SelYear = \Request::get('SelYear');
	    $SelMonth = \Request::get('SelMonth'); //<-- we use global request to get the param of URI

	 	if ($SelYear==null){
	 		$SelYear=carbon::now()->format("Y");
	 	}

	 	if ($SelMonth==null){
	 		$SelMonth=carbon::now()->format("n");
	 	}

		$datas = Pelanggan::all();
		$ocount = count($datas);
		$NewInvc =  DB::table('invoices') //DB::table('Invoices')
						->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
						->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
						->get();
		$icount = count($NewInvc);

		if ($icount==0){
			$LastInvcNo = 0;
		}else{
			$LastRecord = DB::table('invoices') //DB::table('Invoices')
						->get();
			$LastInvcNo = $LastRecord;
			//$LastInvcNo = Invoice::whereRaw('SUBSTRING(NoInvoice, -8,-10) = '.$LastRecord)->get();
		}
		if ($ocount>$icount){
			foreach($datas as $data){
				$LastInvcNo = $LastInvcNo+1;
				$StartPeriode = new Carbon('first day of this month'); 
				$EndPeriode = new Carbon('first day of next month');
				// $JatuhTempo = Carbon::Parse($StartPeriode);
				$JatuhTempo = Carbon::parse($StartPeriode)->addDays(9);

				$invcDate = $LastInvcNo.carbon::now()->format("/m/Y");
				$invoices = New Invoice;
				$invoices->NoInvoice = $invcDate;
				$invoices->TglInvoice = Carbon::Parse($StartPeriode)->format("Y-m-d");
				$invoices->IDPerusahaan = $data->id;
				$invoices->NamaPerusahaan = $data->NamaPerusahaan;
				$invoices->Alamat = $data->Alamat;
				$invoices->Telepon = $data->Telepon;
				$invoices->Email = $data->Email;
				$invoices->Paket = $data->Paket;
				$invoices->TglAktivasi = $data->TglAktivasi;
				$invoices->TglJatuhTempo = Carbon::Parse($JatuhTempo)->format("Y-m-d");
				$invoices->Periode = Carbon::Parse($StartPeriode)->format("d F")." - ".Carbon::Parse($EndPeriode)->format("d F Y");
				$invoices->Bulanan = $data->Bulanan;
				$invoices->Potongan = 0;
				$invoices->PPN = ($data->Bulanan*10/100);
				$invoices->Total = $invoices->Bulanan-$invoices->Potongan+$invoices->PPN;
				$invoices->Status = "BELUM";
				$invoices->TglBayar = Carbon::Parse('0000-00-00')->format("Y-m-d");
				$invoices->save();
			}
			Session::forget('warning');
			Session::flash('success',$ocount-$icount.'data invoice berhasil disimpan');
		}else{
			Session::forget('success');
			Session::flash('warning','tidak data invoice yang disimpan');
		}
		// return redirect()->route('invoice.show', $invoice->id);
		$NewInvc =  DB::table('invoices') //DB::table('Invoices')
						->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
						->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
						->get();
		$icount = count($NewInvc);

		$invoices = DB::table('invoices') 
						->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
						->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
						->paginate(3);
		// $nonaktif = DB::table('invoices')
						// ->whereNotNull('deleted_at')
						// ->get();

		$acount = count($datas)-count($NewInvc);




		$dcount = count($invoices);

		if($dcount != 0){
			$TBulanan = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->sum('Bulanan');

			$TPotongan = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->sum('Potongan');

			$TPPN = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->sum('PPN');

			$TTotal = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->sum('Total');

			$TLunas = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->where("Status","=","Lunas")
							->sum('Total');

			$TBelum = DB::table('invoices')
							->whereRaw("substr(NoInvoice, -4) = ".carbon::now()->format("Y"))
							->whereRaw("substr(NoInvoice, -7,2) = ".carbon::now()->format("n"))
							->where("Status","=","Belum")
							->sum('Total');
		}else{
			$TBulanan =0;
			$TPotongan =0;
			$TPPN =0;
			$TTotal =0;
			$Lunas =0;
			$Belum =0;
		}

		// $acount = $LastInvcNo;
		return view ('invoice.index',['invoices'=>$invoices,'SelYear'=>$SelYear,'SelMonth'=>$SelMonth,'ocount'=>$ocount,'icount'=>$icount,'acount'=>$acount,'TBulanan'=>$TBulanan,'TPotongan'=>$TPotongan,'TPPN'=>$TPPN,'TTotal'=>$TTotal,'TLunas'=>$TLunas,'TBelum'=>$TBelum]);
		// return redirect()-> route('invoice.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$idPerusahaan = invoice::find($id);
		$invoices = DB::table('invoices')
						->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
						->get();

		$dcount = count($invoices);

		if($dcount != 0){
			$TBulanan = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->sum('Bulanan');

			$TPotongan = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->sum('Potongan');

			$TPPN = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->sum('PPN');

			$TTotal = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->sum('Total');

			$TLunas = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->where("Status","=","Lunas")
							->sum('Total');

			$TBelum = DB::table('invoices')
							->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
							->where("Status","=","Belum")
							->sum('Total');
		}else{
			$TBulanan =0;
			$TPotongan =0;
			$TPPN =0;
			$TTotal =0;
			$Lunas =0;
			$Belum =0;
		}

		$singleData = DB::table('invoices')
						->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
						->first();

		return view ('invoice.show',['invoices'=>$invoices,'TBulanan'=>$TBulanan,'TPotongan'=>$TPotongan,'TPPN'=>$TPPN,'TTotal'=>$TTotal,'singleData'=>$singleData,'TLunas'=>$TLunas,'TBelum'=>$TBelum]);
		// return view ('invoice.show')->withInvoice($invoice);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Session::forget('success');
        Session::forget('warning');
        Session::forget('danger');

		$invoice = Invoice::find($id);
		
		return view ('invoice.edit',['invoice'=>$invoice]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
	// 	$this->validate($request, array(
	// 			'Paket' => 'required',
	// 			'Periode' => 'required',
	// 			'TglInvoice' => 'required',
	// 			'TglJatuhTempo' => 'required',
	// 			'Bulanan' => 'required',
	// 			'Potongan' => 'required',
	// 	));

		$invoice = Invoice::find($id);
		if(Carbon::Parse($request->input('TglBayar'))=="0000-00-00"){
			$invoice->Paket = $request->input('Paket');
		}
		// $invoice->Periode = $request->input('Periode');
		$invoice->TglInvoice = Carbon::Parse($request->input('TglInvoice'));
		$invoice->TglJatuhTempo = Carbon::Parse($request->input('TglJatuhTempo'));
		$invoice->Bulanan = $request->input('Bulanan');
		$invoice->Potongan = $request->input('Potongan');
		$invoice->PPN = ($request->input('Bulanan')*10/100);
		$invoice->Total = $invoice->Bulanan-$invoice->Potongan+$invoice->PPN;
		if(Carbon::Parse($request->input('TglBayar'))!="0000-00-00"){
			$invoice->Status = "LUNAS";
			$invoice->TglBayar = Carbon::Parse($request->input('TglBayar'));
			$invoice->CaraBayar = $request->input('CaraBayar');
			$invoice->Keterangan = $request->input('Keterangan');
		}

		$invoice->save();
		Session::flash('success','data invoice berhasil diedit & disimpan');
		// return redirect()->route('invoice.show', $invoice->id);

		$invoices = Invoice::paginate(3);
		$nonaktif = DB::table('invoices')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('invoice.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $invoice = Invoice::find($id);
        $invoice->delete();
		Session::flash('warning','Invoice '. $invoice->NamaPerusahaan .' telah dinonaktifkan');

        $invoices = Invoice::paginate(3);
		$nonaktif = DB::table('invoices')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('invoice.index');
        // return view('invoice.index')->withInvoices($nonaktif);;
	}

    public function restore($id){   
        $invoice = Invoice::withTrashed()->find($id);
        $invoice->restore();
		Session::flash('warning','Invoice '. $invoice->NamaPerusahaan .' telah diaktifkan kembali');

        $invoices = Invoice::paginate(3);
		$nonaktif = DB::table('invoices')
						->whereNotNull('deleted_at')
						->get();

       return redirect()-> route('invoice.index');
    }

    public function delete($id)
    {
        $invoice = Invoice::withTrashed()->find($id);
        $invoice->forceDelete();

        $invoices = Invoice::paginate(3);
		$nonaktif = DB::table('invoices')
						->whereNotNull('deleted_at')
						->get();
		Session::flash('danger','Invoice '. $invoice->NamaPerusahaan .' telah dinonaktifkan permanent');

       return redirect()-> route('invoice.index');	
    }

	public function BAYAR($id)
	{
        Session::forget('success');
        Session::forget('warning');
        Session::forget('danger');

		$invoice = Invoice::find($id);
		
		return view ('invoice.bayar',['invoice'=>$invoice]);
	}




}