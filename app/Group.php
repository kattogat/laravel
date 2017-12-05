<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     // Länka modellen till en annan tabell
     protected $table = 'groups';
     
     // Primary key-kolumnen antas vara id
     protected $primaryKey = 'customer_group_id';
     
     // Primary key-kolumnen antas vara auto-inkrementerande
     public $incrementing = true;
 
     // Laravel sköter timestamps åt dig om du inte säger nej
     public $timestamps = false;
 
     protected $fillable = [
        "customer_group_id",
        "customer_group_code",
        "tax_class_id"
     ];

    public function group_price() {
        return $this->hasMany(Group_price::class);
    }

    public function customers() {
        return $this->hasMany(customers::class);
    }
}
