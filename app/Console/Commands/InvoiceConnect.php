<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\Order;
use App\Invoice;

class InvoiceConnect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:connect {invoive_id} {order_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect an invoice with an order';

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
        $invoive_id = $this->argument('invoive_id');
        $order_id = $this->argument('order_id');
        $this->info("Connecting...");

        DB::table('orders')
            ->where('id', $order_id)
            ->update(['invoice_id' => $invoive_id]);
        $this->info("Done!");
    }
}
