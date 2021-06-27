<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use App\Models\Product;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
