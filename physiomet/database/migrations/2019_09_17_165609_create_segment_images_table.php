<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSegmentImagesTable.
 */
class CreateSegmentImagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('segment_images', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('segment_id')->unsigned();
            $table->foreign('segment_id')->references('id')->on('segments');
            $table->string('image');
            $table->string('label')->nullable();
            $table->integer('order');
            $table->enum('cover', ['y','n'])->default('n');
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
		Schema::drop('segment_images');
	}
}
