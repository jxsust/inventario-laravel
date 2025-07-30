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

    // Relación uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relacion uno a muchos
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    //Relacion polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
