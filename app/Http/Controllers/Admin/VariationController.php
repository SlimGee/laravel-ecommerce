<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\Variation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class VariationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Variation::class, 'variation');
    }

    /**
     * Display the specified resource.
     *
     * @return Renderable
     */
    public function show(Variation $variation)
    {
        return view('admin.variations.show', ['variation' => $variation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        UpdateVariationRequest $request,
        Variation $variation,
    ) {
        $variation->update($request->validated());

        return to_route('admin.variations.show', $variation);
    }
}
