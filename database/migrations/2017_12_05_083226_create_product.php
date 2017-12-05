<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('entity_id')->nullable();
            $table->integer('entity_type_id')->nullable();
            $table->integer('attribute_set_id')->nullable();
            $table->string('type_id', 400)->nullable();
            $table->string('sku', 400)->nullable();
            $table->string('has_options', 400)->nullable();
            $table->integer('required_options')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('status')->nullable();
            $table->string('name', 400)->nullable();
            $table->integer('amount_package')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('is_salable')->nullable();
            $table->integer('is_in_stock')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
