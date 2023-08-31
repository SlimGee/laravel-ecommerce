<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Display the application home page.
     */
    public function index(): Renderable
    {
        return view('home.index');
    }
}
