<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCountry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'United States', 'ISO' => 'US'],
            ['name' => 'Canada', 'ISO' => 'CA'],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert($country);
        }
    }
}
