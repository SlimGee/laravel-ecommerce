<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class AttachVariations
{
    use AsAction;

    public function handle(
        Product $product,
        array|Collection $variations,
    ): Product {
        $product->variations()->sync($variations);

        return $product;
    }
}
