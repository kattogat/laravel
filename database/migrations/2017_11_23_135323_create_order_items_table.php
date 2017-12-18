<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('order_id');
            $table->integer('item_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('name', 300);
            $table->string('sku', 500);
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
        Schema::dropIfExists('order_items');
    }
}
