<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePartnersTable.
 */
class CreatePartnersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('social_reason');
            $table->string('fantasy_name')->nullable();
            $table->string('cnpj');
            $table->string('state_registration');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('amount_employees')->nullable();
            $table->string('acting_region')->nullable();
            $table->string('how_did_it_arrive')->nullable();
            $table->enum('view', ['y', 'n'])->nullable('n');
            $table->string('session_id')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
            /*
             social reason
            fantasy name
            CNPJ
            State registration
            Address
            neighborhood
            City
            state
            Zip code
            telephone
            fax
            email

            amount employees
            acting region
            how did it arrive
             */
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partners');
	}
}
