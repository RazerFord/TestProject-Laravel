<?php

namespace App\Models\Filters\Product;

use App\Services\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class CategoryId implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        return (self::validate($value)) ? $builder :
            $builder->where('product_categories.category_id', $value);
    }

    private static function validate($value)
    {
        return Validator::make(['value' => $value], ['value' => 'integer|numeric|exists:categories,id'])->fails();
    }
}
