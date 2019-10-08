<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePartnerContactsTable.
 */
class CreatePartnerContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->string('name');
            $table->string('office');
            $table->string('phone');
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
		Schema::drop('partner_contacts');
	}
}
