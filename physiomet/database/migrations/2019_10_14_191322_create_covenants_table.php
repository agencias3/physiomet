<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCovenantsTable.
 */
class CreateCovenantsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('covenants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link_url')->nullable();
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
		Schema::drop('covenants');
	}
}
