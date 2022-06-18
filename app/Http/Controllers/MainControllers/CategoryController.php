<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\BaseController;
use App\Services\Interfaces\CategoryInterface;

class CategoryController extends BaseController
{
    public function __construct(CategoryInterface $service)
    {
        $this->service = $service;
    }
}