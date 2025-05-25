<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $filleble = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'category_id',
    ];
}
