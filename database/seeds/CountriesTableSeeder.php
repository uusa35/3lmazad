<?php

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("countries.json");
        $data = collect(json_decode($json));
        foreach ($data as $obj) {
            Country::create([
                'capital' => isset($obj->capital) ? $obj->capital : 'null',
                'citizenship' => isset($obj->citizenship) ? $obj->citizenship : 'null',
                'country_code' => isset($obj->country_code) ? $obj->country_code : 'null',
                'currency' => isset($obj->currency) ? $obj->currency : 'null',
                'currency_code' => isset($obj->currency_code) ? $obj->currency_code : 'null',
                'currency_sub_unit' => isset($obj->currency_sub_unit) ? $obj->currency_sub_unit : 'null',
                'full_name' => isset($obj->full_name) ? $obj->full_name : 'null',
                'iso_3166_2' => isset($obj->iso_3166_2) ? $obj->iso_3166_2 : 'null',
                'iso_3166_3' => isset($obj->iso_3166_3) ? $obj->iso_3166_3 : 'null',
                'name' => isset($obj->name) ? $obj->name : 'null',
                'region_code' => isset($obj->region_code) ? $obj->region_code : 'null',
                'sub_region_code' => isset($obj->sub_region_code) ? $obj->sub_region_code : 'null',
                'eea' => isset($obj->eea) ? $obj->eea : 'null',
                'calling_code' => isset($obj->calling_code) ? $obj->calling_code : 'null',
                'currency_symbol' => isset($obj->currency_symbol) ? $obj->currency_symbol : 'null',
                'currency_decimals' => isset($obj->currency_decimals) ? $obj->currency_decimals : 'null',
                'flag' => isset($obj->flag) ? $obj->flag : 'null',
            ]);
        }
    }
}
