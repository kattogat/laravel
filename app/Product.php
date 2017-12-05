<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     // Länka modellen till en annan tabell
     protected $table = 'products';
     
     // Primary key-kolumnen antas vara id
     protected $primaryKey = 'entity_id';
     
     // Primary key-kolumnen antas vara auto-inkrementerande
     public $incrementing = true;
 
     // Laravel sköter timestamps åt dig om du inte säger nej
     public $timestamps = false;
 
     protected $fillable = [
        "entity_id",
        "entity_type_id",
        "attribute_set_id",
        "type_id",
        "sku",
        "has_options",
        "required_options",
       "created_at",
       "updated_at",
        "status",
        "name",
        "amount_package",
        "price",
        "is_salable",
        "is_in_stock"
     ];

    public function group_price() {
        return $this->hasMany(Group_price::class);
    }
}
