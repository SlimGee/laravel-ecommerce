<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Option;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class OptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOptionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->only(['name']));

        $option->values()->createMany($request->all()['values']);

        return response()->turboStream([
            response()
                ->turboStream()
                ->target("turbo{$request->input('turbo')}")
                ->action('replace')
                ->view('admin.options.show', ['option' => $option]),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Option $option
     * @return Renderable
     */
    public function show(Option $option)
    {
        return view('admin.options.show', [
            'option' => $option,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Option $option
     * @return Renderable
     */
    public function edit(Option $option)
    {
        return view('admin.options.edit', [
            'option' => $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOptionRequest $request
     * @param Option $option
     * @return Renderable
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->update($request->only(['name']));

        $option->values()->delete();

        $option->values()->createMany($request->all()['values']);

        return response()->turboStream([
            response()
                ->turboStream()
                ->target(dom_id($option))
                ->action('replace')
                ->view('admin.options.show', ['option' => $option]),
        ]);
    }
}
