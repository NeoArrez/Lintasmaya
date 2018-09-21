<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('NoInvoice');
			$table->date('TglInvoice');
			$table->string('IDPerusahaan');
			$table->string('NamaPerusahaan');
			$table->string('Alamat');
			$table->string('Telepon');
			$table->string('Email');
			$table->string('Paket');
			$table->string('Periode');
			$table->date('TglAktivasi');
			$table->date('TglJatuhTempo');
			$table->decimal('Bulanan',20,0);
			$table->decimal('Potongan',20,0);
			$table->decimal('PPN',20,0);
			$table->decimal('Total',20,0);
			$table->string('Status');
			$table->date('TglBayar')->nullable();
			$table->string('CaraBayar');
			$table->string('Keterangan');
			$table->softDeletes();			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
