<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //Shipping och Billing behöver inte vara egna tabeller, kan ligga i address. 
     //kunden har en primär address och sedan en ev. billing och shipping adress.
    public function up()
    {
        Schema::create('order_billing_addresses', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('customer_id');
            $table->integer('customer_address_id');
            $table->string('email', 250)->nullable();
            $table->string('firstname', 250);
            $table->string('lastname', 250); 
            $table->string('postcode', 100);
            $table->string('street', 300);
            $table->string('city', 300);
            $table->string('telephone', 250)->nullable();
            $table->string('country_id', 100);
            $table->string('address_type', 100);
            $table->string('company', 300)->nullable();
            $table->string('country', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_billing_addresses');
    }
}
