<?php

namespace App\Services\Interfaces;

use App\Models\Product;

interface ProductInterface
{
    /**
     * Store a new product.
     * 
     * @param array $data
     * @return array $data
     */
    public function storeProduct(array $data): array;

    /**
     * Update product.
     * 
     * @param array $data
     * @param Product $product
     * @return void
     */
    public function updateProduct(array $data, Product $product): void;
}
