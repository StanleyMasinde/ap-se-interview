<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the use dashboard.
     */
    public function index()
    {
        return view('user.index');
    }
}
