<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image', 'new', 'hit', 'recommend'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        return $this->price * $this->pivot->count;
    }

    public function setNewAttribute($value)
    {
        $this->attributes['new'] = ($value === 'on' ? 1 : 0);
    }
    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = ($value === 'on' ? 1 : 0);
    }
    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = ($value === 'on' ? 1 : 0);
    }

    public function isHit()
    {
        return $this->hit === 1;
    }
    public function isNew()
    {
        return $this->new === 1;
    }
    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
