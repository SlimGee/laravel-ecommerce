<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Display the admin home page.
     */
    public function index(): Renderable
    {
        return view('admin.home.index');
    }
}
