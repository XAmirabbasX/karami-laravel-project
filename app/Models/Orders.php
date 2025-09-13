<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function order_products(){
        return $this->hasMany(OrderProducts::class, 'order_id', 'id');
    }

    public function address(){
        return $this->belongsTo(Addresses::class , 'address_id', 'id');
    }
}
