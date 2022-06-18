<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductRequests\ProductStore;
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
     * Store a new category.
     * 
     * @param ProductStore $request
     * @return JsonResponse
     */
    public function store(ProductStore $request): JsonResponse
    {
        $data = $request->validated();

        $product = Product::create($data);
        dd($product);
        return $this->successResponse(__('messages.created'), $product->toArray(), 201);
    }
}
