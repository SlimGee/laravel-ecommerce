<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Option;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class OptionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->only(['name']));

        $option->values()->createMany($request->all()['values']);

        $option
            ->variations()
            ->createMany(
                $option->values->map(
                    fn ($value) => ['variant' => $value->value],
                ),
            );

        return response()->turboStream([
            response()
                ->turboStream()
                ->target("turbo{$request->input('turbo')}")
                ->action('replace')
                ->view('admin.options.show', ['option' => $option]),
            response()
                ->turboStream()
                ->target('variations')
                ->action('append')
                ->view('admin.variations.index', [
                    'variations' => $option->variations,
                ]),
        ]);
    }

    /**
     * Display the specified resource.
     *
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
