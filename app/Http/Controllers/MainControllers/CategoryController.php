<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Categories\CategoryStore;
use App\Services\Interfaces\CategoryInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function __construct(CategoryInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Store a new category. 
     */
    public function store(CategoryStore $request): JsonResponse
    {
        $data = $request->validate();

        $category = Category::create($data);

        return $this->successResponse(__('messages.created'), $category->toArray(), 201);
    }
}
