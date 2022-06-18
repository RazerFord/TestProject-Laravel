<?php

namespace App\Models\Filters\Product;

use App\Services\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class Published implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        return (self::validate($value)) ? $builder : $builder->where('products.published', $value);
    }

    private static function validate($value)
    {
        return Validator::make(['value' => $value], ['value' => 'boolean'])->fails();
    }
}
