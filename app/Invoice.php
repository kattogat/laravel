<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     protected $table = 'invoices';
     protected $primaryKey = 'id';
     public $incrementing = true;
     public $timestamps = true;
 
     protected $fillable = [
        "expiration_date",
        "invoice_date",
        "customer_id",
        "serial_number",
        "total_price_no_vat",
        "total_shipping_no_vat",
        "total_shipping_vat",
        "total_billing_vat",
        "total_price",
        "billing_status"
     ];

     public function order() {
        return $this->hasMany(Order::class);
    }

    public function Customer() {
        return $this->belongsTo(Customer::class);
    }
}
