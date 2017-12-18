<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('email', 250);
            $table->string('firstname', 250);
            $table->string('lastname', 250);
            $table->integer('gender')->nullable();
            $table->integer('customer_activated')->nullable();
            $table->integer('group_id');
            $table->string('customer_company', 250);
            $table->integer('company_id')->nullable();
            $table->unsignedBigInteger('default_billing')->nullable(); 
            $table->unsignedBigInteger('default_shipping')->nullable(); 
            $table->integer('is_active'); 
            $table->timestamps();
            $table->string('customer_invoice_email', 250)->nullable(); 
            $table->string('customer_extra_text', 300)->nullable(); 
            $table->integer('customer_due_date_period')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
