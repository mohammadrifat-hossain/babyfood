<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingBuilder extends Model
{
    use HasFactory;

    protected $casts = [
        'products_id' => 'json',
        'others' => 'json',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
