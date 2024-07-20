<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id', // Add this line
        'quantity_purchased',
        'total_price',
        // Add other fields as needed
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
