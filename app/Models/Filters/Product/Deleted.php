<?php

namespace App\Models\Filters\Product;

use App\Services\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class Deleted implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        if (self::validate($value)) {
            return $builder;
        }

        $where = ($value) ? 'whereNotNull' : 'whereNull';

        return $builder->$where('products.deleted_at');
    }

    private static function validate($value)
    {
        return Validator::make(['value' => $value], ['value' => 'boolean'])->fails();
    }
}
