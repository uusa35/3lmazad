<?php

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $tables = [
        'users', 'sliders', 'ads', 'forms','fields', 'field_form', 'comments', 'brands','models',
        'categories','galleries', 'galleryables', 'images',
        'newsletter', 'aboutus', 'contactus','colors','sizes','deals','ad_deals',
        'roles', 'user_role', 'countries', 'areas'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        if (app()->environment() === 'local') {
            $this->emptyTables($this->tables);
            $this->command->info('seeding started');
            if (DB::table('countries')->count() <= 0) {
                $this->call(CountriesTableSeeder::class);
                $this->call(AreasTableSeeder::class);
            }
            $this->call(FieldsTableSeeder::class);
            $this->call(FormsTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(ColorsTableSeeder::class);
            $this->call(SizesTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
        } elseif (app()->environment() === 'production') {
            if (DB::table('countries')->count() <= 0) {
                $this->call(CountriesTableSeeder::class);
                $this->call(AreasTableSeeder::class);
            }
            $this->call(CategoriesTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ContactusTableSeeder::class);
            $this->call(AboutusTableSeeder::class);
        }
    }

    public function emptyTables($tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && $table) {
                DB::table($table)->truncate();
            }
        }

    }
}
