<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Customer;
use App\Address;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Impotera kunder';

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
        foreach ($response as $customerData) {
            $this->info("Importing customer with id: ".$customerData['id']);
            $customer = Customer::find($customerData['id']);
            if ($customer == null)
                $customer = new Customer();
            $customer->fill($customerData);
            $customer->save();

            if (!isset($customerData['address']) || !is_array($customerData['address'])) continue;
            
            $address = Address::find($customerData['address']['id']);
            if ($address == null)
                $address = new Address();
            $address->fill($customerData['address']);
            $address->save();

        }

    }
}
