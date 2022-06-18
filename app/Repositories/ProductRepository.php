<?php

namespace App\Repositories;

use App\Models\Filters\Product\ProductFilter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository
{
    public function __construct()
    {
        $this->query = Product::query();
    }

    /**
     * Get products with filters.
     * 
     * @param Request $request
     * @return Builder
     */
    public function getCourseByFilter(Request $request): Builder
    {
        return (new ProductFilter())->apply($request)
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'products.published',
                'products.deleted_at',
                'products.updated_at',
                'products.created_at'
            ])->distinct();
    }
}
