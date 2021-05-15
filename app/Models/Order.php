<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone, $userId = 0)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->user_id = $userId;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
