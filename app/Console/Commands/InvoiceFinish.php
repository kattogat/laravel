<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Order;
use App\Invoice;

class InvoiceFinish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:finish {invoive_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finish it!';

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
        $this->info("Finishing an invoice");
        $invoive_id = $this->argument('invoive_id');

        //dates
        $invoice_date = date('Y-m-d');
        $expiration_date = date('Y-m-d', strtotime($invoice_date . "+30 days") );

        //From products
        $orders = DB::table('orders')->where('invoice_id', '=', $invoive_id)->get();

        $total_price = NULL;
        $total_price_no_vat = NULL;
        $total_shipping_no_vat = NULL;
        $total_billing_vat = NULL;
        $total_shipping_vat = NULL;
        $customer_id = NULL;

        //Add it together
        foreach ($orders as $theOrder) {
            $total_price = bcadd($theOrder->grand_total, $total_price, 4);
            $total_shipping_no_vat = bcadd($theOrder->shipping_amount, $total_shipping_no_vat, 4);;
            $total_shipping_vat = bcadd($theOrder->shipping_tax_amount, $total_shipping_vat, 4);
            $total_billing_vat = bcadd($theOrder->tax_amount, $total_billing_vat, 4);

            $customer_id = $theOrder->customer_id;
        }
        $total_price_no_vat = $total_price - $total_billing_vat;

        //serial_number
        $y_date = date('Y');
        $y_date = substr($y_date, 2);
        //170001

        $invoiceMax = DB::table('invoices')->max('serial_number');

        if (substr($invoiceMax, 0, 2) == $y_date) {
            $invoiceMax = substr($invoiceMax, 2);
            $invoiceMax += 1;
        } else {
            $invoiceMax = 1;
        }
        
        $secondPartAsString = strval($invoiceMax);
        $firstPartAsString = strval($y_date);
        if (strlen($secondPartAsString) <= 1) {
            //000
            $secondPartAsString = "000" . $secondPartAsString;
        } elseif (strlen($secondPartAsString) <= 2) {
            //00
            $secondPartAsString = "00" . $secondPartAsString;
        } elseif (strlen($secondPartAsString) <= 3) {
            //0
            $secondPartAsString = "0" . $secondPartAsString; 
        }

        $serial_number = $firstPartAsString . $secondPartAsString; 
       

        DB::table('invoices')
            ->where('id', $invoive_id)
            ->update([
                "expiration_date" => $expiration_date,
                "invoice_date" => $invoice_date, 
                "customer_id" => $customer_id,
                "total_price_no_vat" => $total_price_no_vat,
                "total_shipping_no_vat" => $total_shipping_no_vat,
                "total_shipping_vat" => $total_shipping_vat,
                "total_billing_vat" => $total_billing_vat,
                "total_price" => $total_price,
                "serial_number" => $serial_number,
                ]);

        $this->info("Done!");

    }
}
