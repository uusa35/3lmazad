<?php

namespace App\Jobs;

use App\Models\Ad;
use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateNewVisitorForAd implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ad;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $exists = Visitor::where(['ad_id' => $this->ad->id, 'session_id' => session()->getId()])->first();
        if (!$exists) {
            Visitor::create(['ad_id' => $this->ad->id, 'session_id' => session()->getId()]);
        }
    }
}
