<?php

namespace App\Services\Filter;

use Illuminate\Database\Eloquent\Builder;

interface Filterable
{
    /**
     * Apply filter.
     * 
     * @param Builder $builder
     * @param mixed $value
     */
    public static function apply(Builder $builder, $value);
}
