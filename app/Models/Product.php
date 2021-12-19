<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'image', 'product_name', 'product_stock', 'product_price', 'description', 'condition', 'weight', 'review', 'sold_out'];
    public function category(){
        return $this -> BelongsTo ('App\Models\Category');
    }
}
