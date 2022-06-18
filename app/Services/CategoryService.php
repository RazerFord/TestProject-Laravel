<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\Interfaces\CategoryInterface;

class CategoryService extends AbstractService implements CategoryInterface
{
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
