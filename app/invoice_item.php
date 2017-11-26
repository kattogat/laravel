<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_item extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'invoice_items';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = true;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "id",
        "order_id",
        "item_id",
        "created_at",
        "updated_at",
        "name",
        "sku",
        "qty",
        "price",
        "tax_amount",
        "row_total",
        "price_incl_tax",
        "total_incl_tax",
        "tax_percent",
        "amount_package"
    ];
}
