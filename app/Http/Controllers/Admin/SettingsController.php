<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * The settings index page
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('admin.settings.index');
    }
}
