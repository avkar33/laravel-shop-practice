<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class IsBasketEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $orderId = session('orderId');
        dump($orderId);
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            if ($order->products->count() == 0) {
                session()->flash('warning', 'Корзина пуста');
                return back();
            }
        } else {
            session()->flash('warning', 'Корзина пуста');
            return back();
        }
        return $next($request);
    }
}