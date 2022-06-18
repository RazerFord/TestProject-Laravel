<?php

namespace App\Services\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
    /**
     * Delete category.
     * 
     * @param Category $category
     */
    public function delete(Category $category);
}