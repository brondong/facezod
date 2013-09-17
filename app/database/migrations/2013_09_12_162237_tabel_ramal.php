<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelRamal extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ramal', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('zodiak', 10);
			$table->text('umum');
			$table->text('asmara');
			$table->text('karir');
			$table->text('motivasi');
			$table->string('nomor', 10);
			$table->string('warna', 10);
			$table->date('tanggal', 10);
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
		Schema::drop('ramal');
	}

}
