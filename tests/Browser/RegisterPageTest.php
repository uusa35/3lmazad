<?php

namespace Tests\Browser;

use App\Models\Area;
use App\Models\Category;
use App\Models\Group;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @group register
     */
    public function test_register_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('input[name=name]', 'name whatever')
                ->type('input[name=email]', 'email' . rand(1, 100) . '@email.com')
                ->type('input[name=password]', '123456')
                ->type('input[name=password_confirmation]', '123456')
//                ->attach('avatar', '/Users/usamaahmed/Documents/logo.png')
                ->select('#area', Area::all()->random()->id)
                ->type('input[name=mobile]', 123123)
//                ->radio('is_merchant', 1)
//                ->waitForText('choose_group')
//                ->waitForText('office_phone')
//                ->waitForText('timing')
//                ->select('#group-register', Group::all()->random()->first()->id)
//                ->type('input[name=address]', 'address whatever')
//                ->type('input[name=phone]', 12324234)
//                ->type('textarea[name=description]', 'whatever desc')
//                ->type('input[name=timing]', 'من الساعة ١٢ صباحا وحتى الساعة العاشرة مساءا')
                ->pause(100000)
                ->press('التسجيل')
                ->assertSeeText('name whatever');
        });
    }
}
