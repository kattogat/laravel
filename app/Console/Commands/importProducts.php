<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Group;
use App\Group_price;

class importProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products {file_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products';

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
        $file = $this->argument('file_name');
        
        $this->info("Starting up...");
        $storage =   Storage::get($file);
        $response = json_decode($storage, true);

        foreach ($response['products'] as $productData) {
            $this->info("Importing product with id: " . $productData['entity_id']);
            $product = Product::findOrNew($productData['entity_id']);
            $product->fill($productData);
            $product->fill($productData['stock_item']);
            $product->save();

            foreach ($productData['group_prices'] as $group_price_data) {
                $group_price = Group_price::findOrNew($group_price_data['price_id']);
                $group_price->fill($group_price_data);
                $group_price->save();
            }
        }

        foreach ($response['groups'] as $groupData) {
            $group = Group::findOrNew($groupData['customer_group_id']);
            $group->fill($groupData);
            $group->save();
        }
    }
}
