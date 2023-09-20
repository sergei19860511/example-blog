<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordHandlerRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        auth('web')->logout();

        return redirect(route('home'));
    }

    /**
     * @param LoginFormRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function login(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (auth('web')->attempt($data)) {
            return redirect(route('profile'));
        }

        return redirect(route('login'))->withErrors(['email' => 'Email не найден или данные не верны']);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function registrationForm()
    {
        return view('auth.register');
    }

    /**
     * @param RegisterFormRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function register(RegisterFormRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->create(
            [
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => $data['password']
            ]
        );

        event(new Registered($user));

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('verification.notice'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function forgotForm()
    {
        return view('auth.forgot');
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return RedirectResponse
     */
    public function forgot(ForgotPasswordRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * @param $token
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function resetPassword($token, Request $request)
    {
        return view('auth.password-update', compact('token', 'request'));
    }

    /**
     * @param ForgotPasswordHandlerRequest $request
     * @return RedirectResponse
     */
    public function passwordUpdate(ForgotPasswordHandlerRequest $request)
    {
        $request->validated();

        $status = Password::reset(
            $request->only(['email' => 'email', 'password' => 'password', 'password_confirmation' => 'password_confirmation', 'token' => 'token']),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
