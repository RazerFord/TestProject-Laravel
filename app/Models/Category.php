<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Name of table.
     * 
     * @var string
     */
    protected $table = 'categories';

    /**
     * Properties to allow mass assignment
     * 
     * @var array
     */
    protected $fillable = ['name'];

    use HasFactory;

    /**
     * Return products.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
}
