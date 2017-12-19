<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('increment_id', 500);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->string('customer_email', 250)->nullable();
            $table->string('status', 250);
            $table->string('marking', 250);
            $table->decimal('grand_total', 12, 4);
            $table->decimal('subtotal', 12, 4);
            $table->decimal('tax_amount', 12, 4);
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable(); 
            $table->string('shipping_method', 250);
            $table->decimal('shipping_amount');
            $table->decimal('shipping_tax_amount')->nullable();
            $table->string('shipping_description', 400)->nullable();
            $table->integer('id');
            $table->integer('invoice_id')->nullable(); //-index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
