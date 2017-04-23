<?php

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("areas.json");
        $data = collect(json_decode($json));
        foreach ($data as $obj) {
            Country::create([
                'name_ar' => isset($obj->name_ar) ? $obj->name_ar : 'null',
                'name_en' => isset($obj->name_en) ? $obj->name_en : 'null',
                'country_id' => isset($obj->country_id) ? $obj->country_id : 'null'
            ]);
        }
    }
}
