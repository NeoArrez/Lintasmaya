<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Karyawan;
use Session;

class KaryawanController extends Controller {

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
		$karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();

		return view ('karyawan.index',['karyawans'=>$karyawans,'nonaktif'=>$nonaktif]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view ('karyawan.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
				'NIP' => 'required|alpha_dash|max:25',
				'NamaLengkap' => 'required',
				'Alamat' => 'required',
				'Email' => 'required|Email',
				'HP' => 'required',
				'Jabatan' => 'required',
		));

		$Karyawan = new Karyawan;
		$Karyawan->NIP = $request->NIP;
		$Karyawan->NamaLengkap = $request->NamaLengkap;
		$Karyawan->Alamat = $request->Alamat;
		$Karyawan->Email = $request->Email;
		$Karyawan->HP = $request->HP;
		$Karyawan->Jabatan = $request->Jabatan;
		$Karyawan->Keterangan = $request->Keterangan;

		$Karyawan->save();
		Session::flash('success','data karyawan berhasil disimpan');
		// return redirect()->route('karyawan.show', $Karyawan->id);

		$karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();

		return view ('karyawan.index',['karyawans'=>$karyawans,'nonaktif'=>$nonaktif]);
		// return redirect()-> route('karyawan.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $karyawan = Karyawan::find($id);
		// return view ('karyawan.show')->withKaryawan($karyawan);
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

		$karyawan = Karyawan::find($id);
		return view ('karyawan.edit')->withKaryawan($karyawan);
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
				'NIP' => 'required|alpha_dash|max:25',
				'NamaLengkap' => 'required',
				'Alamat' => 'required',
				'Email' => 'required|Email',
				'HP' => 'required',
				'Jabatan' => 'required',
		));

		$karyawan = Karyawan::find($id); 
		$karyawan->NIP = $request->input('NIP');
		$karyawan->NamaLengkap = $request->input('NamaLengkap');
		$karyawan->Alamat = $request->input('Alamat');
		$karyawan->Email = $request->input('Email');
		$karyawan->HP = $request->input('HP');
		$karyawan->Jabatan = $request->input('Jabatan');
		$karyawan->Keterangan = $request->input('Keterangan');

		$karyawan->save();
		Session::flash('success','data karyawan berhasil diedit & disimpan');
		// return redirect()->route('karyawan.show', $Karyawan->id);

		$karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('karyawan.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
		Session::flash('warning','Karyawan '. $karyawan->NamaLengkap .' telah dinonaktifkan');

        $karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('karyawan.index');
        // return view('karyawan.index')->withKaryawans($nonaktif);;
	}

    public function restore($id){   
        $karyawan = Karyawan::withTrashed()->find($id);
        $karyawan->restore();
		Session::flash('warning','Karyawan '. $karyawan->NamaLengkap .' telah diaktifkan kembali');

        $karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();

       return redirect()-> route('karyawan.index');
    }

    public function delete($id){
        $karyawan = Karyawan::withTrashed()->find($id);
        $karyawan->forceDelete();

        $karyawans = Karyawan::paginate(3);
		$nonaktif = DB::table('karyawans')
						->whereNotNull('deleted_at')
						->get();
		Session::flash('danger','Karyawan '. $karyawan->NamaLengkap .' telah dinonaktifkan permanent');

       return redirect()-> route('karyawan.index');	
    }

}