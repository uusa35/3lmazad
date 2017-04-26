<?php

use App\Models\Field;
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
            'title', 'description', 'price', 'active', 'featured', 'phone', 'condition', 'manufacturing_year', 'mileage', 'transmission', 'room_no', 'floor_no', 'bathroom_no', 'rent_type', 'building_age', 'furnished', 'space', 'address', 'image', 'user_id', 'category_id', 'area_id', 'brand_id', 'model_id', 'color_id', 'size_id',
        ];
        foreach ($fieldsArray as $k => $v) {
            factory(Field::class)->create(['name' => $v, 'value' => $v]);
        }
    }
}
