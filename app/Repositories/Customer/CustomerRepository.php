<?php

namespace App\Repositories\Customer;

use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends BaseRepository
{
    protected $model;

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function exist($dni)
    {
        if ($customer = $this->model->where('dni', $dni)->first()) {
            return $customer;
        }
        return false;
    }

    public function store(array $data = [])
    {
        if ($customer = $this->exist('dni', $data['dni'])) {
            return $customer;
        }
        return $this->model->create($data);
    }

    public function modifyStatus($status, $id)
    {
        $customer_shift = DB::table('customer_schedule')->where('id', $id)->first();
        $customer_shift->status = $status;
        return $customer_shift->save();
    }

    public function get($user_id = null)
    {
        $query = $this->model->with('branch.user', 'shifts');
        if ($user_id) {
            $branch_id = DB::table('branches')->where('user_id', $user_id)->first()->id;
            return $query->where('branch_id', $branch_id)->get();
        }
        return $query->get();
    }
}
