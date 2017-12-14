<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\Insta_pic;

class ImportInsta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:insta {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Instagram pics';

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
        
        $this->info("Initializing curl...");
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($curl), true);

        foreach ($response['data'] as $data) {
            $this->info("Importing with id: ".$data['id']);
            $one = Insta_pic::findOrNew($data['id']);

            $one->fill([
                "id" => $data['id'],
                "url" => $data['images']['standard_resolution']['url']
            ])->save();
        }
    }
}
