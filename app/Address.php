<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'address';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = true;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "id",
        "customer_id",
        "customer_address_id",
        "email",
        "firstname", 
        "lastname",
        "postcode",
        "street",
        "city",
        "telephone",
        "country_id",
        "address_type",
        "company",
        "country"
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}