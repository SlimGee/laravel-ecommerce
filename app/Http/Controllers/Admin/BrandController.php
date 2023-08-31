<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brand');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Renderable
    {
        $brands = QueryBuilder::for(Brand::class)
            ->allowedFilters([AllowedFilter::scope('search', 'whereScout')])
            ->paginate()
            ->appends($request->query());

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());

        return to_route('admin.brands.index')->with(
            'success',
            'Brand was successfully created',
        );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): Renderable
    {
        return view('admin.brands.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateBrandRequest $request,
        Brand $brand,
    ): RedirectResponse {
        $brand->update($request->validated());

        return to_route('admin.brands.index')->with(
            'success',
            'Brand was successfully updated',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return to_route('admin.brands.index')->with(
            'success',
            'Brand was successfully deleted',
        );
    }
}
