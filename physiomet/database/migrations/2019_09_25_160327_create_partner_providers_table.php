<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePartnerProvidersTable.
 */
class CreatePartnerProvidersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_providers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->string('social_reason');
            $table->string('cnpj');
            $table->string('phone');
            $table->string('state');
            $table->string('city');
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
		Schema::drop('partner_providers');
	}
}
