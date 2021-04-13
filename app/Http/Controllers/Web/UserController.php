<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(UserRepository $user)
    {
        $this->middleware('auth');
        $this->model = $user;
    }

    public function index()
    {
        return view('branch.index', ['users' => $this->model->all()]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->model->updateUser($request->all(), $id);
            return redirect()->back()->with('message', 'Usuario modificado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create(CreateUserRequest $request)
    {
        try {
            $this->model->storeUser($request->all());
            return redirect()->back()->with('message', 'Usuario creado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteUser($id);
            return redirect()->back()->with('message', 'Usuario eliminado.');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
