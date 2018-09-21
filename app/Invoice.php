<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model {

	use SoftDeletes;

	protected $table = 'invoices';
	protected $fillable = ['NoInvoice','TglInvoice','IDPerusahaan','NamaPerusahaan','Alamat','Telepon','Email','Paket','Periode','TglAktivasi','TglJatuhTempo','Bulanan','Potongan','PPN','Total','Status','TglBayar','CaraBayar','Keterangan'];

	protected $dates = ['deleted_at','TglAktivasi','TglInvoice','TglJatuhTempo','TglBayar'];

}

