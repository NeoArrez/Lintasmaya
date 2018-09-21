<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use App\Bts;
use Session;

class BtsController extends Controller {

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
		$btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();

		return view ('bts.index',['btss'=>$btss,'nonaktif'=>$nonaktif]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view ('bts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
				'NamaBTS' => 'required',
		));

		$bts = New Bts;
		$bts->NamaBTS = $request->NamaBTS;
		$bts->Keterangan = $request->Keterangan;

		$bts->save();
		Session::flash('success','data BTS berhasil disimpan');
		// return redirect()->route('bts.show', $bts->id);

		$btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();

		return view ('bts.index',['btss'=>$btss,'nonaktif'=>$nonaktif]);
		// return redirect()-> route('bts.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bts = Bts::find($id);
		return view ('bts.show')->withBts($bts);
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

		$bts = Bts::find($id);
		return view ('bts.edit')->withBts($bts);
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
				'NamaBTS' => 'required',
		));

		$bts = Bts::find($id); 
		$bts->NamaBTS = $request->input('NamaBTS');
		$bts->Keterangan = $request->input('Keterangan');

		$bts->save();
		Session::flash('success','data BTS berhasil diedit & disimpan');
		// return redirect()->route('bts.show', $bts->id);

		$btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('bts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $bts = Bts::find($id);
        $bts->delete();
		Session::flash('warning','BTS '. $bts->NamaBTS .' telah dinonaktifkan');

        $btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('bts.index');
        // return view('bts.index')->withBts($nonaktif);;
	}

    public function restore($id){   
        $bts = Bts::withTrashed()->find($id);
        $bts->restore();
		Session::flash('warning','BTS '. $bts->NamaBTS .' telah diaktifkan kembali');

        $btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();

       return redirect()-> route('bts.index');
    }

    public function delete($id){
        $bts = Bts::withTrashed()->find($id);
        $bts->forceDelete();

        $btss = Bts::paginate(3);
		$nonaktif = DB::table('bts')
						->whereNotNull('deleted_at')
						->get();
		Session::flash('danger','BTS '. $bts->NamaBTS .' telah dinonaktifkan permanent');

       return redirect()-> route('bts.index');	
    }

}