<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Invoice;

class InvoiceCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an invoice';

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
        $this->info("Creating an invoice");
            $invoice = Invoice::create();

            $invoice->fill([
                "expiration_date" => NULL,
                "invoice_date" => NULL,
                "customer_id" => NULL,
                "serial_number" => NULL,
                "total_price_no_vat" => NULL,
                "total_shipping_no_vat" => NULL,
                "total_shipping_vat" => NULL,
                "total_billing_vat" => NULL,
                "total_price" => NULL,
                "billing_status" => NULL
            ])->save();
            $this->info("Done!");
    }
}
