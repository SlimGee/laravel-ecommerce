<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGeneralSettingsRequest;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    /**
     * Display the general settings page
     *
     * @param GeneralSettings $settings
     * @return Renderable
     */
    public function show(GeneralSettings $settings): Renderable
    {
        return view('admin.settings.general', [
            'settings' => $settings
        ]);
    }

    /**
     * Update the general settings
     *
     * @param UpdateGeneralSettingsRequest $request
     * @param GeneralSettings $settings
     * @return RedirectResponse
     */
    public function update(UpdateGeneralSettingsRequest $request, GeneralSettings $settings)
    {
        $settings->fill($request->validated());

        $settings->save();

        return redirect()->route('admin.settings.general.show')
            ->with('success', 'You have successfully updated your settings');
    }
}