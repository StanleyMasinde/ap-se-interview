<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the index page of the admin dashboard.
     */
    public function index()
    {
        return view('admin.index');
    }
}
