<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GetWebPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:webpage {url} {file_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hämta en websida och spara den som en fil';

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
        //Sparar argumenten som variabler
        $url = $this->argument('url');
        $file = $this->argument('file_name');

        //CURL förfrågan, slänger headern och ger bara innehållet
        $this->info("Initializing curl...");
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        //Sparar till en fil
        $this->info("Sending Request to: ".$url);
        $respons = curl_exec($curl);
        Storage::put($file, $respons);
        $this->info("File stored at: ".$file);
    }
}
