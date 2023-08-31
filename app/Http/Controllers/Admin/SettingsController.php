<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class SettingsController extends Controller
{
    /**
     * The settings index page
     */
    public function index(): Renderable
    {
        return view('admin.settings.index');
    }
}
