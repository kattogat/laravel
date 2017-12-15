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
        $string = substr($string, 2, -2);
        $string = strtolower($string);

        $arr = explode(" ", $string);

        $notThoseWords = [
            "julbord",
            "en",
            "2"
        ];
        $noDouble = array_unique($arr);
        $words = array_diff($noDouble, $notThoseWords);

        foreach ($words as $word) {
        
            $count = substr_count($string, $word);
            echo "Det finns <b>" . $count . "</b> utav <b>" . $word . "</b><br>";
        }
    }
}
