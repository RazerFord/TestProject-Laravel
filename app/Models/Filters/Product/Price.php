<?php

namespace App\Models\Filters\Product;

use App\Services\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class Price implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        if (self::validate($value)) {
            return $builder;
        }
        
        [$min, $max] = explode('-', $value);

        if ($min > $max) {
            return $builder;
        }

        return $builder->whereBetween('products.price', [$min, $max]);
    }

    private static function validate($value)
    {
        return Validator::make(['value' => $value], ['value' => 'string|regex:/^[1-9]{1}[0-9]*-[1-9]{1}[0-9]*$/'])->fails();
    }
}
