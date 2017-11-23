<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->string('email', 250)->nullable();
            $table->string('firstname', 250)->nullable();
            $table->string('lastname', 250)->nullable();
            $table->integer('gender')->nullable();
            $table->integer('customer_activated')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('customer_company', 250)->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('default_billing')->nullable();
            $table->integer('default_shipping')->nullable();
            $table->integer('is_active')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
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
