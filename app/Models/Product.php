<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
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

    /**
     * Return categories.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories')->withTimestamps();
    }

    /**
     * Return product_categories.
     */
    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
