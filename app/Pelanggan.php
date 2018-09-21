<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model {

	use SoftDeletes;

	protected $table = 'pelanggans';
	protected $fillable = ['NamaPerusahaan','Alamat','Kota','Email','Telepon','NPWP','Paket','Password','Bulanan','TglAktivasi','IPComputer','BTS','Keterangan'];

	protected $dates = ['deleted_at','TglAktivasi'];
}
