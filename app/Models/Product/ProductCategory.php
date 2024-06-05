<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsTo(Product::class)->select('id', 'status', 'title', 'image_path', 'image', 'regular_price', 'sale_price', 'slug');
    }
}
