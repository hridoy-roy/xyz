<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as FakerData;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakerData2 = FakerData::create();

       for ($i=0; $i < 20 ; $i++) { 
        $customer = new Customers;
        $customer->name = $fakerData2->name;
        $customer->email = $fakerData2->email;
        $customer->password = $fakerData2->password;
        $customer->gender = "m";
        $customer->address = $fakerData2->address;
        $customer->city = $fakerData2->state;
        $customer->dob = $fakerData2->date;
        $customer->points = $fakerData2->unique()->numberBetween(1, 20);
        $customer->country = $fakerData2->country;
        $customer->state = $fakerData2->state;
        $customer->save();
       }
        
       
    }
}
