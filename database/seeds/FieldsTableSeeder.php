<?php

use App\Models\Field;
use App\Models\Form;
use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fieldsArray = [
            'title', 'description', 'price',
            'active', 'featured', 'phone',
//            'condition', 'manufacturing_year', 'mileage', 'transmission', 'type',
//            'room_no', 'floor_no', 'bathroom_no', 'rent_type', 'building_age',
//            'furnished', 'space',
//            'brand_id', 'model_id',
            'color_id', 'size_id',
            'address', 'image', 'user_id', 'category_id', 'area_id',
        ];

        $isFilterArray = ['condition', 'manufacturing_year', 'type',
            'transmission', 'room_no', 'floor_no', 'brand_id', 'model_id', 'mileage',
            'bathroom_no', 'rent_type', 'building_age', 'furnished', 'space'];

        foreach ($fieldsArray as $k => $v) {
            factory(Field::class)->create(['is_filter' => 0, 'name' => $v]);
        }
        foreach ($isFilterArray as $k => $v) {
            factory(Field::class)->create(['is_filter' => 1, 'name' => $v]);
        }
    }
}
