<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bts extends Model {

	use SoftDeletes;

	protected $table = 'bts';
	protected $fillable = ['NamaBTS','Keterangan'];

	protected $dates = ['deleted_at'];

}
