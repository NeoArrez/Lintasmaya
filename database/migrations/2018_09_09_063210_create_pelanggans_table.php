<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelanggans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('NamaPerusahaan');
			$table->string('Alamat',255);
			$table->string('Kota',255);
			$table->string('Email');
			$table->string('Telepon');
			$table->string('NPWP');
			$table->string('Paket');
			$table->string('Password',60);
			$table->decimal('Bulanan',20,0);
			$table->date('TglAktivasi');
			$table->string('IPComputer');
			$table->string('BTS');
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
		Schema::drop('pelanggans');
	}

}
