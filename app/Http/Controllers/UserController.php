<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\User;
use Session;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(3);
		$nonaktif = DB::table('users')
						->whereNotNull('deleted_at')
						->get();

		return view ('user.index',['users'=>$users,'nonaktif'=>$nonaktif]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view ('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
			'name' => 'required|max:255',
			'NamaLengkap' => 'required|max:255', // tambahan manual
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		));

		$user = new User;
		$user->name = $request->name;
		$user->NamaLengkap = $request->NamaLengkap;
		$user->email = $request->email;
		$user->Password = bcrypt($request->Password);

		$user->save();

		Session::flash('success','data user berhasil disimpan');
		// return redirect()->route('user.show', $user->id);

		$users = User::paginate(3);
		$nonaktif = DB::table('users')
						->whereNotNull('deleted_at')
						->get();

		return view ('user.index',['users'=>$users,'nonaktif'=>$nonaktif]);
		// return redirect()-> route('user.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $user = User::find($id);
		// return view ('user.show')->withUser($user);
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

		$user = User::find($id);
		return view ('user.edit',['user'=>$user]);
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
			'name' => 'required|max:255',
			'NamaLengkap' => 'required|max:255', // tambahan manual
			'email' => 'required|email|max:255',
			'password' => 'required|confirmed|min:6',
		));

		$user = User::find($id);
		$user->name = $request->input('name');
		$user->NamaLengkap = $request->input('NamaLengkap');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));

		$user->save();
		Session::flash('success','data user berhasil diedit & disimpan');
		// return redirect()->route('user.show', $user->id);

		$users = User::paginate(3);
		$nonaktif = DB::table('users')
						->whereNotNull('deleted_at')
						->get();

		return redirect()-> route('user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::find($id);
		if (Auth::user() != $user) {

	        $user->delete();
			Session::flash('warning','User '. $user->NamaLengkap .' telah dinonaktifkan');

	        $users = User::paginate(3);
			$nonaktif = DB::table('users')
							->whereNotNull('deleted_at')
							->get();

	    } else {
			Session::flash('warning','Anda tidak bisa menonkatifkan diri sendiri');
	    }
		return redirect()-> route('user.index');
        // return view('user.index')->withusers($nonaktif);;
	}

    public function restore($id){   
        $user = User::withTrashed()->find($id);
        $user->restore();
		Session::flash('warning','User '. $user->NamaLengkap .' telah diaktifkan kembali');

        $users = User::paginate(3);
		$nonaktif = DB::table('users')
						->whereNotNull('deleted_at')
						->get();

       return redirect()-> route('user.index');
    }

    public function delete($id){
        $user = User::withTrashed()->find($id);
        $user->forceDelete();

        $users = User::paginate(3);
		$nonaktif = DB::table('users')
						->whereNotNull('deleted_at')
						->get();
		Session::flash('danger','User '. $user->NamaLengkap .' telah dinonaktifkan permanent');

       return redirect()-> route('user.index');	
    }

}