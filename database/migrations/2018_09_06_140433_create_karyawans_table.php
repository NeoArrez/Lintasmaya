<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('NIP')->unique();
			$table->string('NamaLengkap');
			$table->string('Alamat',255);
			$table->string('Email');
			$table->string('HP');
			$table->string('Jabatan');
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
		Schema::drop('karyawans');
	}

}
