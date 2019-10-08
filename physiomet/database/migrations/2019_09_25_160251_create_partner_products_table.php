<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePartnerProductsTable.
 */
class CreatePartnerProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->string('product');
            $table->string('manufacturer');
            $table->string('description');
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
		Schema::drop('partner_products');
	}
}
