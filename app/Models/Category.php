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


    use HasFactory;
}
