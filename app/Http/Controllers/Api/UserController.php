<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $model;

    public function __construct(UserRepository $user)
    {
        $this->middleware('jwt.auth')->except('create');
        $this->model = $user;
    }

    public function create(CreateUserRequest $request)
    {
        return $this->success($this->model->storeUser($request->all()));
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->success($this->model->updateUser($request->all(), auth()->user()->id));
    }

    public function delete($id)
    {
        return $this->success($this->model->deleteUser($id));
    }

    public function get()
    {
        return $this->success($this->model->getUser(auth()->user()->id));
    }
}
