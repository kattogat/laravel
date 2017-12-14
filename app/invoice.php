<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
     // Länka modellen till en annan tabell
     protected $table = 'invoices';
     
     // Primary key-kolumnen antas vara id
     protected $primaryKey = 'id';
     
     // Primary key-kolumnen antas vara auto-inkrementerande
     public $incrementing = true;
 
     // Laravel sköter timestamps åt dig om du inte säger nej
     public $timestamps = false;
 
     protected $fillable = [
        "increment_id",
        "created_at",
        "updated_at",
        "customer_id",
        "customer_email",
        "status",
        "marking",
        "grand_total",
        "subtotal",
        "tax_amount",
        "billing_address_id",
        "shipping_address_id",
        "shipping_method",
        "shipping_amount",
        "shipping_tax_amount",
        "shipping_description",
        "id"
     ];

    public function invoice_shipping_address() {
        return $this->hasOne(invoice_shipping_address::class);
    }

    public function invoice_item() {
        return $this->hasOne(invoice_item::class);
    }

    public function invoice_billing_address() {
        return $this->hasOne(invoice_billing_address::class);
        //return $this->hasOne(Address::class, billing_address_id, id);
    }

    public function Customer() {
        return $this->belongsTo(Customer::class);
    }
}
