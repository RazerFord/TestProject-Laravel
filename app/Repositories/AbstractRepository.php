<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository
{
    protected Builder $query;
}
