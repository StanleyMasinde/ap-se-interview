<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Lang;

class AuthController extends Controller
{
    /**
     * Authenticate a user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect('user/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => Lang::get('auth.failed')
        ]);
    }
}
