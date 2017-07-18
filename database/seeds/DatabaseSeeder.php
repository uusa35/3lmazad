<?php

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $tables = [
        'users', 'sliders', 'ads', 'ad_metas', 'forms', 'fields', 'field_form', 'comments', 'brands', 'models',
        'categories', 'galleries', 'galleryables', 'images','ad_deal',
        'newsletter', 'aboutus', 'contactus', 'colors', 'sizes', 'deals', 'ad_deals',
        'roles', 'user_role', 'countries', 'areas', 'commercials', 'types'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        if (app()->environment() === 'seeding') {
            $this->emptyTables($this->tables);
            $this->command->info('seeding started');
            if (DB::table('countries')->count() <= 0) {
                $this->call(CountriesTableSeeder::class);
                $this->call(AreasTableSeeder::class);
            }
            $this->call(PlansTableSeeder::class);
            $this->call(FieldsTableSeeder::class);
            $this->call(FormsTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->command->info('UsersTableseeder is done');
            $this->call(ColorsTableSeeder::class);
            $this->command->info('colors are done');
            $this->call(SizesTableSeeder::class);
            $this->command->info('sizes are done');
            $this->call(SlidersTableSeeder::class);
            $this->command->info('sliders are done');
            $this->call(AboutusTableSeeder::class);
            $this->call(FaqsTableSeeder::class);
            $this->call(TermsTableSeeder::class);
            $this->call(ContactusTableSeeder::class);
            $this->call(NewsletterTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(RoleUserTableSeeder::class);
            $this->call(CommercialsTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            $this->command->info('categories are done');
            $this->call(AdVisitorsTableSeeder::class);
            $this->command->info('before favorites');
            $this->call(FavoritesTableSeeder::class);
            $this->call(UsersCategoriesSeeder::class);

        } elseif (app()->environment() === 'production') {
            if (DB::table('countries')->count() <= 0) {
                $this->call(CountriesTableSeeder::class);
                $this->call(AreasTableSeeder::class);
            }
            $this->call(CategoriesTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ContactusTableSeeder::class);
            $this->call(AboutusTableSeeder::class);
        } else {
            dd('please change the .env environment const to : seeding');
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
