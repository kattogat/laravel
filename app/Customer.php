<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'customers';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = true;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "id",
        "email",
        "firstname", 
        "lastname",
        "gender",
        "customer_activated",
        "group_id",
        "customer_company",
        "default_billing",
        "default_shipping",
        "is_active",
        "created_at",
        "updated_at",
        "customer_invoice_email",
        "customer_extra_text"
    ];
}