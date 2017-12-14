<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insta_pic extends Model
{
     // Länka modellen till en annan tabell
     protected $table = 'insta_pics';
     
     // Primary key-kolumnen antas vara id
     protected $primaryKey = 'id';
     
     // Primary key-kolumnen antas vara auto-inkrementerande
     public $incrementing = false;
 
     // Laravel sköter timestamps åt dig om du inte säger nej
     public $timestamps = true;
 
     protected $fillable = [
        "id",
        "url"
     ];
}
