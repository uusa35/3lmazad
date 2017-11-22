<?php
namespace App\Observers;

use App\Models\Deal;
use App\Models\Gallery;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Ad;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * Ad: usamaahmed
 * Date: 6/28/17
 * Time: 6:40 PM
 */
class AdObserver
{
    /**
     * Listen to the Ad created event.
     *
     * @param  Ad $Ad
     * @return void
     */
    public function created(Ad $ad)
    {
        $plan = Plan::where('is_paid', false)->first();
        $ad->deals()->save(Deal::create([
            'start_date' => Carbon::today(),
            'end_date' => Carbon::now()->addDays(Plan::where('is_paid', false)->first()->duration),
            'plan_id' => $plan->id,
            'valid' => true,
            'duration' => $plan->duration
        ]));
        $ad->gallery()->save(new Gallery());
    }

    /**
     * Listen to the Ad deleting event.
     *
     * @param  Ad $Ad
     * @return void
     */
    public function deleted(Ad $ad)
    {

    }
}