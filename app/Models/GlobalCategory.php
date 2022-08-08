<?php

namespace App\Models;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalCategory extends Model
{
    use HasFactory;

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
