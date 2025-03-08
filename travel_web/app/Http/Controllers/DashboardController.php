<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index_dashboard() {
        return view('dashboard.index');
    }
}
