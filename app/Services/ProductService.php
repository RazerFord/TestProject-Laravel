<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Interfaces\ProductInterface;

class ProductService extends AbstractService implements ProductInterface
{
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
}
