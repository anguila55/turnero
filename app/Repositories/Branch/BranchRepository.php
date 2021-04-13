<?php

namespace App\Repositories\Branch;

use App\Repositories\Base\BaseRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class BranchRepository extends BaseRepository
{
    protected $model;
    protected $user;

    public function __construct(Branch $branch, UserRepository $user)
    {
        $this->model = $branch;
        $this->user = $user;
    }

    public function store(array $data = [])
    {
        $user = $this->user->storeUser($data);
        $data['user_id'] = $user->id;
        return $this->model->create($data);
    }

    public function modify(array $data = [], $id)
    {
        $branch = $this->findOrFail($id);
        $user = $this->user->findOrFail($branch->user_id);
        $user->name = $data['name'];
        $user->save();
        return $branch->update($data);
    }

    public function del($id)
    {
        $branch = $this->findOrFail($id);
        $branch->delete();
        return $this->user->deleteUser($branch->user_id);
    }

    public function getAll($id = null)
    {
        $query = $this->model->with('user');
        if ($id) {
            return $query->where('id', $id)->first();
        }
        return $query->get();
    }
}
