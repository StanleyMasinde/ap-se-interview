<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the use dashboard.
     */
    public function index()
    {
        return view('user.index', [
            'user' => Auth::user()->load('subscription')
        ]);
    }

    /**
     * Subscribe a user
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);

        Subscription::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'subscription_date' => now()->format('Y-m-d'),
            'status' => 'active'
        ]);

        return back()->with('success', 'Subscription added');
    }

    /**
     * Log a user out
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
