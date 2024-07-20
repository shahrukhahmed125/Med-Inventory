<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    // protected $fillable = ['product_name', 'manufacturer_name', 'quantity_in_stock', 'unit_price'];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
