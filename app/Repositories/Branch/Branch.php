<?php

namespace App\Repositories\Branch;

use App\Repositories\Base\BaseModel;
use App\Repositories\Customer\Customer;
use App\Repositories\Schedule\Schedule;
use App\Repositories\User\User;

class Branch extends BaseModel
{
    protected $fillable = [
        'user_id',
        'city',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shcedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
