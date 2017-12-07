<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $customer_address_id
 * @property string|null $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $postcode
 * @property string|null $street
 * @property string|null $city
 * @property string|null $telephone
 * @property string|null $country_id
 * @property string|null $address_type
 * @property string|null $company
 * @property string|null $country
 * @property-read \App\Customer|null $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCustomerAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereTelephone($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    // Länka modellen till en annan tabell
    protected $table = 'addresses';
    
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