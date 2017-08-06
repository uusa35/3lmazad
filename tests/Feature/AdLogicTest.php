<?php

namespace Tests\Feature;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Deal;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdLogicTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_ad_has_many_deals_but_only_return_which_has_valid_deals()
    {
        factory(Ad::class, 1)->create(['title' => 'testing usama', 'category_id' => Category::where('parent_id', '!=', 0)->first()])->each(function ($ad) {
            $ad->deals()->saveMany(factory(Deal::class, 2)->create((['end_date' => Carbon::now()->addDays(3)])));
            $ad->deals()->saveMany(factory(Deal::class, 1)->create((['end_date' => Carbon::now()->subDays(3)])));
        });
        $ad = Ad::where('title', 'testing usama')->first();
        $dealsCount = $ad->deals()->count();
        $this->assertTrue($ad->deals()->count() == 2);
    }
}
