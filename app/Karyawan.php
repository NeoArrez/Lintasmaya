<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model {

	use SoftDeletes;

	protected $table = 'karyawans';
	protected $fillable = ['NIP','NamaLengkap','Alamat','Email','HP','Jabatan','Keterangan'];

	protected $dates = ['deleted_at'];

}
