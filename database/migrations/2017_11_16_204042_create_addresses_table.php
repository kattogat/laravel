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
            $table->integer('id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('customer_address_id')->nullable();
            $table->string('email', 250)->nullable();
            $table->string('firstname', 250)->nullable();
            $table->string('lastname', 250)->nullable();
            $table->string('postcode', 100)->nullable();
            $table->string('street', 250)->nullable();
            $table->string('city', 300)->nullable();
            $table->string('telephone', 250)->nullable();
            $table->string('country_id', 10)->nullable();
            $table->string('address_type', 100)->nullable();
            $table->string('company', 250)->nullable();
            $table->string('country', 250)->nullable();
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