<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MajorDbChanges extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::drop('places');
        Schema::create('places', function($table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('acronym', 16);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tickets', function($table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services', function($table) {
            $table->increments('id');
            $table->string('employee', 32);
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->timestamps();
            $table->softDeletes();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('places');
        Schema::drop('tickets');
        Schema::drop('services');

        Schema::create('places', function($table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('acronym', 16);
            $table->integer('tickets')->default(0);
            $table->integer('counter')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
	}

}
