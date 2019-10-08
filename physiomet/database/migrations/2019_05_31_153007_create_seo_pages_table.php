<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSeoPagesTable.
 */
class CreateSeoPagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo_pages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->text('script')->nullable();
            $table->text('script_body')->nullable();
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
		Schema::drop('seo_pages');
	}
}
