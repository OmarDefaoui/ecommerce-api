<?php

namespace App\Models;

use App\Models\Product;
use App\Models\GlobalCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function globalCategory()
    {
        return $this->belongsTo(GlobalCategory::class);
    }
}
