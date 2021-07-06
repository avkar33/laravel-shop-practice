<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Traits\Translatable;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['name', 'name_en', 'code', 'description', 'description_en', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
