<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('customer_id')->index(); 
            $table->unsignedBigInteger('customer_address_id')->nullable(); 
            $table->string('email', 250)->nullable();
            $table->string('firstname', 250);
            $table->string('lastname', 250);
            $table->string('postcode', 100);
            $table->string('street', 250);
            $table->string('city', 300);
            $table->string('telephone', 250)->nullable();
            $table->string('country_id');
            $table->string('address_type')->nullable();
            $table->string('company', 250)->nullable();
            $table->string('country', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
