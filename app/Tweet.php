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

    static public function getTweets ($token, $word) {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q='.$word'",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$token,
            "cache-control: no-cache",
            "postman-token: 496a4314-13dd-73af-8191-ba825d1a693d"
          ),
        ));
        
        $response = json_decode(curl_exec($curl), true);

        $clean = [];
        foreach ($response['statuses'] as $data) {

            $clean[] = $data['text'];
        }

        return $clean;

    }

    static public function countAndSort ($tweets) {
        $superArr = [];
        foreach ($tweets as $tweet) {
            $exploded = explode(" ", $tweet);
            $superArr = array_merge($superArr ,$exploded);
        }

        $counted = array_count_values($superArr);
        arsort($counted);

        return $counted;

    }
}
