<?php

use App\Models\Field;
use App\Models\Form;
use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Form::class,10)->create()->each(function ($form) {
            $form->fields()->saveMany(Field::all()->random()->take(5));
        });
    }
}
