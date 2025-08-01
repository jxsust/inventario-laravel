<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory; 

    protected $fillable = [
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
    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    //Relacion uno a muchos
    public function wareHouses()
    {
        return $this->belongsToMany(Warehouse::class)
         ->withPivot('stock')
         ->withTimestamps();
    }
    
    public function quotes()
    {
        return $this->belongsToMany(Quote::class, 'productable');
    }

    public function sales()
    {
        return $this->belongsToMany(Quote::class)
        ->withPivot('quantity','price','subtotal')
        ->withTimestamps(); 
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
        ->withPivot('quantity','price','subtotal')
        ->withTimestamps(); 
    }    

    public function inputs()
    {
        return $this->belongsToMany(Input::class)
        ->withPivot('quantity')
        ->withTimestamps(); 
    }

    public function outputs()
    {
        return $this->belongsToMany(Output::class)
        ->withPivot('quantity')
        ->withTimestamps(); 
    }

    public function transfers()
    {
        return $this->belongsToMany(Transfer::class)
        ->withPivot('quantity')
        ->withTimestamps(); 
    }

    //Relacion uno a muchos
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    //Releacion muchos a muchos polimorfica
    public function purchaseOrders()
    {
        return $this->morphedByMany(PurchaseOrder::class, 'productable');
    }


    //Relacion polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
