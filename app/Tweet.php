<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';
    
    // Primary key-kolumnen antas vara id
    protected $primaryKey = 'id';
    
    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = false;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = true;

    protected $fillable = [
       "id",
       "text"
    ];

    static public function countWords ($all) { 
        $tweets = $all->pluck('text');
        $string = json_encode($tweets);
        $string = substr($string, 2);
        $string = substr($string, 0, -2);
        $arr = explode(" ", $string);
        $words = array_unique($arr);

        foreach ($words as $word) {
        
            $count = substr_count($string, $word);
            echo "Det finns " . $count . " utav " . $word . "<br>";
        }
    }
}
