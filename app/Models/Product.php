<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_title',
        'product_description',
        'price',
        'stock',
        'product_image',
    ];
    
    public function orders(){
        return $this->belongsToMany(Order::class,'product_id');
    }
    
}
