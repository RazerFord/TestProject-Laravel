<?php

namespace App\Services;

use App\Exceptions\ErrorException;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;

class ProductService extends AbstractService implements ProductInterface
{
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a new product.
     * 
     * @param array $data
     * @return array $data
     */
    public function storeProduct(array $data): array
    {
        try {
            DB::beginTransaction();

            $product = Product::create($data);

            $product->categories()->attach($data['categories']);

            DB::commit();

            return (new ProductResource($product))->toArray(request());
        } catch (\Exception $e) {
            DB::rollback();

            throw new ErrorException($e->getMessage(), null, 400);
        }
    }

    /**
     * Update product.
     * 
     * @param array $data
     * @param Product $product
     * @return void
     */
    public function updateProduct(array $data, Product $product): void
    {
        try {
            DB::beginTransaction();

            $product->update($data);

            if (isset($data['categories'])) {
                $product->productCategories()->delete();
                $product->categories()->attach($data['categories']);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw new ErrorException($e->getMessage(), null, 400);
        }
    }
}
