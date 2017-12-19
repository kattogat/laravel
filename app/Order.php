<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     // Länka modellen till en annan tabell
     protected $table = 'orders';
     
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

    public function order_shipping_address() {
        return $this->hasOne(Order_shipping_address::class);
    }

    public function order_item() {
        return $this->hasOne(Order_item::class);
    }

    public function order_billing_address() {
        return $this->hasOne(Order_billing_address::class);
    }

    public function Customer() {
        return $this->belongsTo(Customer::class);
    }

    public function Invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
