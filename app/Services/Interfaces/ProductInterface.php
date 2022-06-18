<?php

namespace App\Services\Interfaces;

interface ProductInterface
{
    /**
     * Store a new product.
     * 
     * @param array $data
     * @return array $data
     */
    public function storeProduct(array $data): array;
}
