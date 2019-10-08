<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTipItemsTable.
 */
class CreateTipItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tip_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tip_id')->unsigned();
            $table->foreign('tip_id')->references('id')->on('tips');
            $table->string('name');
            $table->integer('progress')->nullable();
            $table->enum('active', ['y', 'n'])->default('n');
            $table->integer('order')->nullable();
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
		Schema::drop('tip_items');
	}
}
