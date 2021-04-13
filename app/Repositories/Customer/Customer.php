<?php

namespace App\Repositories\Customer;


use App\Repositories\Base\BaseModel;
use App\Repositories\Branch\Branch;
use App\Repositories\Shift\Shift;

class Customer extends BaseModel
{
    protected $fillable = [
        'branch_id',
        'name',
        'dni',
        'email',
        'phone'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
