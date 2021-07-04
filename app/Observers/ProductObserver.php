<?php

namespace App\Observers;

use App\Models\Product;
use App\Mail\SendSubscriptionMessage;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{

    public function updating(Product $product)
    {
        $oldCount = $product->getOriginal('count');
        if ($oldCount == 0 && $product->count > 0) {
            $subscribedUsers = $product->users;
            foreach ($subscribedUsers as $user) {
                Mail::to($user->email)->send(new SendSubscriptionMessage($product, $user));
            }
        }
    }
}
