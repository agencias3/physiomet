<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTeamsTable.
 */
class CreateTeamsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('crefito')->nullable();
            $table->string('email')->nullable();
            $table->string('office')->nullable();
            $table->string('description')->nullable();
            $table->string('complement')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->enum('active', ['y', 'n'])->default('n');
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
		Schema::drop('teams');
	}
}
