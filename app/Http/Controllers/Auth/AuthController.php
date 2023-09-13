<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('home'));
    }

    public function login(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (auth('web')->attempt($data)) {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors(['email' => 'Email не найден или данные не верны']);
    }

    public function registrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterFormRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->create(
            [
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => $data['password'],
            ]
        );

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('home'));
    }
}
