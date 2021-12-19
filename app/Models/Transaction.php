<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['invoice', 'alamat', 'paymentmethod_id', 'payment_deadline', 'courier_id', 'total_payments', 'cart_id', 'status'];
    public function paymentmethod(){
        return $this -> BelongsTo('App\Models\Paymentmethod');
    }
    public function Courier(){
        return $this -> BelongsTo('App\Models\Courier');
    }
}
