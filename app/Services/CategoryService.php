<?php

namespace App\Services;

use App\Exceptions\ErrorException;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Interfaces\CategoryInterface;

class CategoryService extends AbstractService implements CategoryInterface
{
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Delete category.
     * 
     * @param Category $category
     */
    public function delete(Category $category)
    {
        if ($category->hasProducts()) {
            throw new ErrorException(__('messages.has_product'), null, 400);
        }

        $category->delete();
    }
}
