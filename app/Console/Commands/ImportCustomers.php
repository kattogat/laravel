<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\Customer;
use App\Address;
use App\Company;

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

        $this->info("Initializing curl...");
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($curl), true);
        foreach ($response as $customerData) {
            $this->info("Importing customer with id: ".$customerData['id']);
            $customer = Customer::find($customerData['id']);
            //$customer = Customer::findOrNew($id);
            if ($customer == null) {
                $customer = new Customer();
                $customer->fill($customerData);
                $customer->save();
            }

            if (isset($customerData['address']) && is_array($customerData['address'])) {
                $address = Address::findOrNew($customerData['address']['id']);
                $address->fill($customerData['address']);
                $address->save();
            }


            $this->info("Importing: ".$customerData['customer_company']);
            $company = Company::where('customer_company', '=', $customerData['customer_company'])->first();
            if ($company == null) {
                $company = new Company();
                $company->fill($customerData);
                $company->save();
            }

            DB::table('customers')
            ->where('customer_company', '=', $company['customer_company'])
            ->update(['company_id' => $company->id]);

            //SELECT * FROM `companies` WHERE customer_company LIKE 'Overlay AB'

        }


        // $user = User::with('phone')->find(1);

        // $users = User::all();
        // $post = Post::find(1);
        // $post->comments()->where("user_id" = 1);
        // $post-comments;
        //foreach ($users as $user) {
            // $user->phone->phone_number;
            // $user->comments;
        // }

    }
}
