<?php

namespace App\Repositories\Schedule;

use App\Repositories\Base\BaseModel;
use App\Repositories\Branch\Branch;
use Carbon\Carbon;

class Schedule extends BaseModel
{
    protected $fillable = [
        'branch_id',
        'start',
        'end',
        'lapse',
        'day',
        'cant'
    ];

    public function day()
    {
        return Carbon::getDays()[$this->day];
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
