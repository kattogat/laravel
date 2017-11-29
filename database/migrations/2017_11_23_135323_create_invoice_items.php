<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('name', 300)->nullable();
            $table->string('sku', 500)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('tax_amount')->nullable();
            $table->decimal('row_total')->nullable();
            $table->decimal('price_incl_tax')->nullable();
            $table->decimal('total_incl_tax')->nullable();
            $table->decimal('tax_percent')->nullable();
            $table->integer('amount_package')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
