<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function __construct()
    {
        $this->query = Product::query();
    }
}
