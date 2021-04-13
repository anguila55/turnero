<?php

namespace App\Repositories\Shift;

use App\Repositories\Base\BaseModel;
use App\Repositories\Branch\Branch;
use App\Repositories\Customer\Customer;
use Carbon\Carbon;

class Shift extends BaseModel
{
    protected $fillable = [
        'branch_id',
        'customer_id',
        'date',
        'status'
    ];

    public function date()
    {
        return Carbon::make($this->date)->format('d-m-y');
    }

    public function hour()
    {
        return Carbon::make($this->date)->format('H:i');
    }

    public function shift()
    {
        return Carbon::make($this->date)->format('d-m-y H:i');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
