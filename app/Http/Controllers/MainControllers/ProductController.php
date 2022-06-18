<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductRequests\ProductStore;
use App\Http\Requests\ProductRequests\ProductUpdate;
use App\Services\Interfaces\ProductInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Product;

class ProductController extends BaseController
{
    public function __construct(ProductInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Store a new product.
     * 
     * @param ProductStore $request
     * @return JsonResponse
     */
    public function store(ProductStore $request): JsonResponse
    {
        $data = $request->validated();

        $product = $this->service->storeProduct($data);

        return $this->successResponse(__('messages.created'), $product, 201);
    }

    /**
     * Update product.
     * 
     * @param ProductUpdate $request
     * @return JsonResponse
     */
    public function update(ProductUpdate $request, Product $product): JsonResponse
    {
        $data = $request->validated();

        $product = $this->service->updateProduct($data, $product);

        return $this->successResponse(__('messages.updated'), $product, 200);
    }
}
