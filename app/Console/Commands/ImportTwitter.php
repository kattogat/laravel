<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tweet;

class ImportTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:tweet {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import tweets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $token = $this->argument('token');
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q=julbord",
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

        foreach ($response['statuses'] as $data) {
            $this->info("Importing with id: ".$data['id']);
            $one = Tweet::findOrNew($data['id']);

            $one->fill([
                "id" => $data['id'],
                "text" => $data['text']
            ])->save();
        }
        
    }
}
