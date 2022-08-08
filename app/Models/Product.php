<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'colors',
        'review',
        'discount',
        'product_category_id'
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }
}
