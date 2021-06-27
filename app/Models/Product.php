<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image', 'new', 'hit', 'recommend', 'count'];

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }
    public function reduceCount($count)
    {
        $this->count =  $this->count > 1 ? $this->count - $count : 0;
        $this->save();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getPriceForCount()
    {
        return $this->price * $this->pivot->count;
    }

    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;
    }

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
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
