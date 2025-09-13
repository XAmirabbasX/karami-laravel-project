<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function images(){
        return $this->belongsToMany(Photo::class, 'photoproducts' , 'product_id');
    }
}
