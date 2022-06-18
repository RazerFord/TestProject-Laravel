<?php

namespace App\Models\Filters\Product;

use App\Models\Product;
use App\Services\Filter\Searchable;
use App\Services\Filter\BaseSearch;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter implements Searchable
{
    const MODEL = Product::class;

    use BaseSearch {
        BaseSearch::applyObjectsFromRequest as applyObjectsFromRequestTrait;
    }

    /**
     * Apply filter for model.
     * 
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private function applyObjectsFromRequest(Request $request, Builder $query): Builder
    {
        $query = $query->withTrashed()
            ->leftJoin('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->leftJoin('categories', 'categories.id', '=', 'product_categories.category_id');

        return $this->applyObjectsFromRequestTrait($request, $query);
    }
}
