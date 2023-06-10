<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([AllowedFilter::scope('search', 'whereScout')])
            ->paginate()
            ->appends($request->query());

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create(
            $request
                ->safe()
                ->collect()
                ->filter(fn($value) => !is_null($value))
                ->except(['images'])
                ->all(),
        );

        collect($request->validated('images'))->each(function ($image) use (
            $product,
        ) {
            $product->attachMedia(new File(storage_path('app/' . $image)));
            Storage::delete($image);
        });

        return to_route('admin.products.index')->with(
            'success',
            'Product was successfully created',
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Renderable
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update(
            $request
                ->safe()
                ->collect()
                ->filter(fn($value) => !is_null($value))
                ->except(['images'])
                ->all(),
        );

        collect($request->validated('images'))->each(function ($image) use (
            $product,
        ) {
            $product->attachMedia(new File(storage_path('app/' . $image)));
            Storage::delete($image);
        });

        return to_route('admin.products.index')->with(
            'success',
            'Product was successfully updated',
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.products.index')->with(
            'success',
            'Product was successfully deleted',
        );
    }
}
