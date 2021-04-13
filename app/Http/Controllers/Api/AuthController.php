<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->middleware('jwt.auth')->except('login', 'forgot', 'reset');
        $this->user = $user;
    }

    public function login(LoginRequest $request)
    {
        if (!$token = JWTAuth::attempt($request->only(['email', 'password']))) {
            throw new Exception('Invalid Credentials.', 1);
        }
        return $this->success(new LoginResource(['token' => $token, 'user' => auth()->user()]));
    }

    public function logout()
    {
        auth()->logout();
        return $this->success([], 'Logged out Successfully.');
    }

    public function change(Request $request)
    {
        return $this->success($this->user->changePassword($request->all(), auth()->user()->id), 'Contraseña modificada.');
    }

    public function forgot(Request $request)
    {
        return $this->success($this->user->sendMail($request->only('email')), 'Link de recuperación enviado.');
    }

    public function reset(LoginRequest $request)
    {
        return $this->success($this->user->resetPassword($request->all()), 'Contraseña reseteada.');
    }
}
