<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->integer('increment_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('customer_email', 250)->nullable();
            $table->string('status', 250)->nullable();
            $table->string('marking', 250)->nullable();
            $table->decimal('grand_total')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('tax_amount')->nullable();
            $table->integer('billing_address_id')->nullable();
            $table->integer('shipping_address_id')->nullable();
            $table->string('shipping_method', 250)->nullable();
            $table->decimal('shipping_amount')->nullable();
            $table->decimal('shipping_tax_amount')->nullable();
            $table->string('shipping_description', 400)->nullable();
            $table->integer('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
