<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class AttachImages
{
    use AsAction;

    public function handle(Product $product, array $images): Product
    {
        collect($images)->each(function ($image) use ($product) {
            $product->attachMedia(new File(storage_path('app/' . $image)));
            Storage::delete($image);
        });

        return $product;
    }
}
