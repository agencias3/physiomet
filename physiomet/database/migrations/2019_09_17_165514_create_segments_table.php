<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSegmentsTable.
 */
class CreateSegmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('segments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('resume')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->nullable();
            $table->enum('active', ['y', 'n'])->default('n');
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->string('seo_link');
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
		Schema::drop('segments');
	}
}
