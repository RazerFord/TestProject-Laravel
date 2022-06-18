<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * Name of table.
     * 
     * @var string
     */
    protected $table = 'product_categories';
}
