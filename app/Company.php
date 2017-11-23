<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $id
 * @property string|null $customer_company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCustomerCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'companies';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = true;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "id",
        "customer_company"
    ];
}
