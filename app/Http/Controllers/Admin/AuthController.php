<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Attemmpt to login an admin user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(FacadesAuth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return redirect('/admin/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }
}
