<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'product_qty', 'total_price', 'status_checkout', 'status', 'user_id'];
    public function product(){
        return $this -> BelongsTo ('App\Models\Product');
    }
    public function user(){
        return $this -> BelongsTo ('App\Models\User');
    }
}
