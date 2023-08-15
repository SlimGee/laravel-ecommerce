<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLegalSettingsRequest;
use App\Settings\LegalSettings;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class LegalSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *~~`
     * @param LegalSettings $settings
     * @return Renderable
     */
    public function index(LegalSettings $settings): Renderable
    {
        return view('admin.settings.legal', [
            'settings' => $settings
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLegalSettingsRequest $request
     * @param LegalSettings $legalSettings
     * @return RedirectResponse
     */
     public function update(UpdateLegalSettingsRequest $request, LegalSettings $legalSettings): RedirectResponse
    {
        $legalSettings->fill($request->validated());

        $legalSettings->save();

        return redirect()->route('admin.settings.legal.show')
            ->with('success', 'You have successfully updated your settings');
    }
}
