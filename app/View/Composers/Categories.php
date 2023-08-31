<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class Categories
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->withCount('products')
            ->get()
            ->filter(fn ($category) => $category->products_count > 0);

        $view->with('categories', $categories);
    }
}
