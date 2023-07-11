<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class LinkOption
{
    use AsAction;

    public function handle(Product $product, Collection|array $data): Product
    {
        $product->options()->sync($data);

        return $product;
    }
}
