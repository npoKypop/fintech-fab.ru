<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTablesSendSignals extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('ff-actions-calc')->drop('signals');

		Schema::connection('ff-actions-calc')->create('signals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_id');
			$table->string('name');
			$table->string('signal_sid');
			$table->timestamps();
		});

		Schema::connection('ff-actions-calc')->create('send_signals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_id');
			$table->string('signal_sid');
			$table->boolean('flag_url');
			$table->boolean('flag_queue');
			$table->timestamps();
		});

		Schema::connection('ff-actions-calc')->table('rules', function (Blueprint $table) {
			$table->dropColumn('signal');
		});

		Schema::connection('ff-actions-calc')->table('rules', function (Blueprint $table) {
			$table->string('signal_sid');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('ff-actions-calc')->drop('signals');
		Schema::connection('ff-actions-calc')->drop('send_signals');

		Schema::connection('ff-actions-calc')->create('signals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_id');
			$table->string('name');
			$table->string('signal_sid');
			$table->boolean('flag_url');
			$table->boolean('flag_queue');
			$table->timestamps();
		});

		Schema::connection('ff-actions-calc')->table('rules', function (Blueprint $table) {
			$table->dropColumn('signal_sid');
		});

		Schema::connection('ff-actions-calc')->table('rules', function (Blueprint $table) {
			$table->string('signal');
		});
	}

}
