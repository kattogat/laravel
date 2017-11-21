<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Address;

class ImportAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:address {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Adress';

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
        $url = $this->argument('url');

        //CURL förfrågan, slänger headern och ger bara innehållet
        $this->info("Initializing curl...");
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($curl), true);
        foreach ($response as $addressData) {
            foreach ($addressData as $key) {
            
                $this->info("Importing Address with id: ".$key['id']);
                $address = Address::find($key['id']);
                if ($address == null)
                    $address = new Address();
                $address->fill($key);
                $address->save();
            }
        }
    }
}

 /* Json med ett under objekt */