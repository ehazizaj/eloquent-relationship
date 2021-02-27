<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('countries')->get()->count() == 0) {
            DB::table('countries')->insert([
                'name' => "Austria",
                'iso2' => "AT",
                'iso3' => "AUT"
            ]);
            DB::table('countries')->insert([
                'name' => "France",
                'iso2' => "FR",
                'iso3' => "FRA"
            ]);
            DB::table('countries')->insert([
                'name' => "Germany",
                'iso2' => "DE",
                'iso3' => "DEU"
            ]);
            DB::table('countries')->insert([
                'name' => "Spain",
                'iso2' => "ES",
                'iso3' => "ESP"
            ]);
            DB::table('countries')->insert([
                'name' => "Russian Federation",
                'iso2' => "RU",
                'iso3' => "RUS"
            ]);
            DB::table('countries')->insert([
                'name' => "China",
                'iso2' => "CN",
                'iso3' => "CHN"
            ]);
        }
        else { echo "\e[31mTable is not empty, therefore NOT "; }
    }

}
