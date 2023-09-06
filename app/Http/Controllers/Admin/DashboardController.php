<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Auth;
use Dotenv\Store\File\Reader;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the page for admin login
     */
    public function loginView()
    {
        return view('admin');
    }


    /**
     * Show the index page of the admin dashboard.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $subscriptions = [];

        if ($status) {
            $subscriptions = Subscription::whereStatus($status)->with('user')->get();
        } else {
            $subscriptions = Subscription::with('user')->latest()->get();
        }

        return view('admin.index', [
            'subscriptions' => $subscriptions,
            'status' => $status
        ]);
    }

    /**
     * Filter by annual subscriptions
     */
    public function annual(Request $request)
    {
        $status = $request->input('status');
        $subscriptions = [];

        if ($status) {
            $subscriptions = Subscription::whereStatus($status)
                ->whereType('annual')
                ->with('user')
                ->get();
        } else {
            $subscriptions = Subscription::with('user')
                ->whereType('annual')
                ->latest()
                ->get();
        }

        return view('admin.index', [
            'subscriptions' => $subscriptions,
            'status' => $status
        ]);
    }

    /**
     * Filter by monthly subscriptions
     */
    public function monthly(Request $request)
    {
        $status = $request->input('status');
        $subscriptions = [];

        if ($status) {
            $subscriptions = Subscription::whereStatus($status)
                ->whereType('monthly')
                ->with('user')
                ->get();
        } else {
            $subscriptions = Subscription::with('user')
                ->whereType('monthly')
                ->latest()
                ->get();
        }

        return view('admin.index', [
            'subscriptions' => $subscriptions,
            'status' => $status
        ]);
    }

    /**
     * Show a single subscription.
     */
    public function showSubscription(Request $request, Subscription $subscription)
    {
        return view('subscription.show', [
            'subscription' =>$subscription->load('user')
        ]);
        
    }

    /**
     * Log an admin out
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
