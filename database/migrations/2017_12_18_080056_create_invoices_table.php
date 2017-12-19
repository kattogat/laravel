<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('expiration_date')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->string('serial_number')->nullable();
            $table->decimal('total_price_no_vat')->nullable();
            $table->decimal('total_shipping_no_vat')->nullable();
            $table->decimal('total_shipping_vat')->nullable();
            $table->decimal('total_billing_vat')->nullable();
            $table->decimal('total_price')->nullable();
            $table->boolean('billing_status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
