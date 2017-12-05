<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_price extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'group_prices';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'price_id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = true;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "price",
        "group_id",
        "price_id"
    ];

    public function Group() {
        return $this->belongsTo(Group::class);
    }

    public function Product() {
        return $this->belongsTo(Product::class);
    }
}
