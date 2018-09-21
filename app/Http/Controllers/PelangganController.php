<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Pelanggan;
use App\Bts;
use App\Invoice;
use Session;
use Carbon\Carbon;

class PelangganController extends Controller {

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
		$pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();

		return view ('pelanggan.index',['pelanggans'=>$pelanggans,'nonaktif'=>$nonaktif]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$btslists = Bts::lists('NamaBTS');
		return view ('pelanggan.create',['btslists'=>$btslists]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
				'NamaPerusahaan' => 'required',
				'Alamat' => 'required',
				'Kota' => 'required',
				'Email' => 'required|Email',
				'Telepon' => 'required',
				'NPWP' => 'required',
				'Paket' => 'required',
				'Password' => 'required',
				'Bulanan' => 'required',
				'TglAktivasi' => 'required',
				'IPComputer' => 'required',
				'NamaBTS' => 'required',
		));

		$pelanggan = new Pelanggan;
		$pelanggan->NamaPerusahaan = $request->NamaPerusahaan;
		$pelanggan->Alamat = $request->Alamat;
		$pelanggan->Kota = $request->Kota;
		$pelanggan->Email = $request->Email;
		$pelanggan->Telepon = $request->Telepon;
		$pelanggan->NPWP = $request->NPWP;
		$pelanggan->Paket = $request->Paket;
		$pelanggan->Password = $request->Password;
		$pelanggan->Bulanan = $request->Bulanan;
		$pelanggan->TglAktivasi = Carbon::parse($request->TglAktivasi);
		$pelanggan->IPComputer = $request->IPComputer;
		$pelanggan->BTS = $request->NamaBTS;

		$pelanggan->save();
		Session::flash('success','data pelanggan berhasil disimpan');
		// return redirect()->route('pelanggan.show', $pelanggan->id);

		$pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();

		return view ('pelanggan.index',['pelanggans'=>$pelanggans,'nonaktif'=>$nonaktif]);
		// return redirect()-> route('pelanggan.index');
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
		}else{
			$TBulanan =0;
			$TPotongan =0;
			$TPPN =0;
			$TTotal =0;
		}

		$singleData = DB::table('invoices')
						->where('idPerusahaan',"=",$idPerusahaan->IDPerusahaan)
						->first();

		return view ('invoice.show',['invoices'=>$invoices,'TBulanan'=>$TBulanan,'TPotongan'=>$TPotongan,'TPPN'=>$TPPN,'TTotal'=>$TTotal,'singleData'=>$singleData]);
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

		$pelanggan = Pelanggan::find($id);
		$btslists = Bts::lists('NamaBTS');
		return view ('pelanggan.edit',['pelanggan'=>$pelanggan,'btslists'=>$btslists]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, array(
				'NamaPerusahaan' => 'required',
				'Alamat' => 'required',
				'Kota' => 'required',
				'Email' => 'required|Email',
				'Telepon' => 'required',
				'NPWP' => 'required',
				'Paket' => 'required',
				'Password' => 'required',
				'Bulanan' => 'required',
				'TglAktivasi' => 'required',
				'IPComputer' => 'required',
				'NamaBTS' => 'required',
		));

		$pelanggan = Pelanggan::find($id);
		$pelanggan->NamaPerusahaan = $request->input('NamaPerusahaan');
		$pelanggan->Alamat = $request->input('Alamat');
		$pelanggan->Kota = $request->input('Kota');
		$pelanggan->Email = $request->input('Email');
		$pelanggan->Telepon = $request->input('Telepon');
		$pelanggan->NPWP = $request->input('NPWP');
		$pelanggan->Paket = $request->input('Paket');
		$pelanggan->Password = $request->input('Password');
		$pelanggan->Bulanan = $request->input('Bulanan');
		$pelanggan->TglAktivasi = Carbon::parse($request->input('TglAktivasi'));
		$pelanggan->IPComputer = $request->input('IPComputer');
		$pelanggan->BTS = $request->input('NamaBTS');

		$pelanggan->save();
		Session::flash('success','data pelanggan berhasil diedit & disimpan');
		// return redirect()->route('pelanggan.show', $pelanggan->id);

		$pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('pelanggan.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
		Session::flash('warning','Pelanggan '. $pelanggan->NamaPerusahaan .' telah dinonaktifkan');

        $pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('pelanggan.index');
        // return view('pelanggan.index')->withPelanggans($nonaktif);;
	}

    public function restore($id){   
        $pelanggan = Pelanggan::withTrashed()->find($id);
        $pelanggan->restore();
		Session::flash('warning','Pelanggan '. $pelanggan->NamaPerusahaan .' telah diaktifkan kembali');

        $pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();

       return redirect()-> route('pelanggan.index');
    }

    public function delete($id){
        $pelanggan = Pelanggan::withTrashed()->find($id);
        $pelanggan->forceDelete();

        $pelanggans = Pelanggan::paginate(3);
		$nonaktif = DB::table('pelanggans')
						->whereNotNull('deleted_at')
						->get();
		Session::flash('danger','Pelanggan '. $pelanggan->NamaPerusahaan .' telah dinonaktifkan permanent');

       return redirect()-> route('pelanggan.index');	
    }

}