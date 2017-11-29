<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\invoice;
use App\invoice_shipping_address;
use App\invoice_item;
use App\invoice_billing_address;

class importInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:inovices {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import inovices';

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
        foreach ($response as $invoiceData) {
            if ($invoiceData['status'] == "processing") {
                $this->info("Importing invoice with id: ".$invoiceData['id']);
                $customer = invoice::find($invoiceData['id']);
                if ($customer == null) {
                    $customer = new invoice();
                    $customer->fill($invoiceData);
                    $customer->save();
                }
            

                if (isset($invoiceData['shipping_address']) && is_array($invoiceData['shipping_address'])) {
                    $ship_address = invoice_shipping_address::findOrNew($invoiceData['shipping_address']['id']);
                    $ship_address->fill($invoiceData['shipping_address']);
                    $ship_address->save();
                }

                if (isset($invoiceData['billing_address']) && is_array($invoiceData['billing_address'])) {
                    $ship_address = invoice_billing_address::findOrNew($invoiceData['billing_address']['id']);
                    $ship_address->fill($invoiceData['billing_address']);
                    $ship_address->save();
                }

                foreach ($invoiceData['items'] as $itemsData) {
                    $items = invoice_item::find($itemsData['id']);
                    if ($items == null) {
                        $items = new invoice_item();
                        $items->fill($itemsData);
                        $items->save();
                    }
                }

            }
        }
    }
}