<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('ABOUTUS');
        });
    }

    public function testSeeContactus() {
        $this->browse(function (Browser $browser) {
           $browser->visit('/')->assertSee('CONTACT US');
        });
    }

    public function testSearch() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertTitle('3lmazad')->type('search','test')->press('Search')->assertSee('test');
        });
    }
}
