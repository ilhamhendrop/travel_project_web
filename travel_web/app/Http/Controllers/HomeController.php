<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index_home() {
        $travels = Travel::paginate(4);

        return view('home.index', compact('travels'));
    }

    public function detail_product(Travel $travel) {
        return view('home.detail', compact('travel'));
    }
}
