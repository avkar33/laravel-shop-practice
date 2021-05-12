<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('basket', ['order' => $order]);
        }
        return view('basket');
    }

    public function basketOrder()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            session()->flash('warning', 'Корзина пуста');
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        return view('order', ['order' => $order]);
    }

    public function basketConfirm(Request $request)
    {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);
        if ($success) {
            session()->flash('success', 'Заказ оформлен');
        } else {
            session()->flash('warning', 'Ошибка');
        }
        return redirect()->route('index');
    }

    public function baskerdAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        return redirect()->route('basket');
    }

    public function baskedRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return false;
        }
        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            }
            $pivotRow->count--;
            $pivotRow->update();
        }
        return redirect()->route('basket');
    }
}
