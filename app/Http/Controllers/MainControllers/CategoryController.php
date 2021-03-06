<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CategoryRequests\CategoryStore;
use App\Http\Resources\CategoryResource;
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
     * 
     * @param CategoryStore $request
     * @return JsonResponse
     */
    public function store(CategoryStore $request): JsonResponse
    {
        $data = $request->validated();

        $category = Category::create($data);

        $category = (new CategoryResource($category))->toArray($request);

        return $this->successResponse(__('messages.created'), $category, 201);
    }

    /**
     * Delete category.
     * 
     * @param Category $category
     * @return JsonResponse
     */
    public function delete(Category $category): JsonResponse
    {
        $this->service->delete($category);

        return $this->successResponse(__('messages.deleted'), null, 200);
    }
}
