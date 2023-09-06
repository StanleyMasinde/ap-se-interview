<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
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
}
