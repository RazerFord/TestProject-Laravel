<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductRequests\ProductStore;
use App\Http\Requests\ProductRequests\ProductUpdate;
use App\Services\Interfaces\ProductInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function __construct(ProductInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Get products with filters.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = $this->service->repository->getCourseByFilter($request)->get()->toArray();

        return $this->successResponse(__('messages.received'), $data, 200);
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
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductUpdate $request, Product $product): JsonResponse
    {
        $data = $request->validated();

        $this->service->updateProduct($data, $product);

        return $this->successResponse(__('messages.updated'), null, 200);
    }

    /**
     * Delete product.
     * 
     * @param Product $request
     * @return JsonResponse
     */
    public function delete(Product $product): JsonResponse
    {
        $product->delete();

        return $this->successResponse(__('messages.deleted'), null, 200);
    }
}
