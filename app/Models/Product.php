<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Name of table.
     * 
     * @var string
     */
    protected $table = 'products';

    /**
     * Properties to allow mass assignment
     * 
     * @var array
     */
    protected $fillable = ['name', 'price', 'published'];

    use HasFactory;
}
