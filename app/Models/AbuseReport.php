<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AbuseReport extends Model
{
    protected $table = 'abuse_reports';
    protected $guarded = [''];

    public function abuser()
    {
        return $this->belongsTo(User::class, 'abuser_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
