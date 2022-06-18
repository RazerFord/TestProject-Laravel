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

        return $this->successResponse(__('messages.created'), (new CategoryResource($category))->toArray($request), 201);
    }
}
