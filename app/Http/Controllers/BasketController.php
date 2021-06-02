<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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

        if (Auth::check()) {
            $user = Auth::user();
            $success = $order->saveOrder($request->name, $request->phone, $user->id);
        } else {
            $success = $order->saveOrder($request->name, $request->phone);
        }
        if ($success) {
            session()->flash('success', 'Заказ оформлен');
        } else {
            session()->flash('warning', 'Ошибка');
        }
        foreach ($order->products as $product) {
            if ($product->pivot->count > $product->count) {
                session()->flash('warning', "Товара ' {$product->name} ' не достаточно на складе");
                return redirect()->route('basket');
            }
            $product->reduceCount($product->pivot->count);
        }
        Order::eraseOrderSum();
        session(['basket_count' => 0]);

        return redirect()->route('index');
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        $product = Product::find($productId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count + 1 > $product->count) {
                session()->flash('warning', "Товара ' {$product->name} ' не достаточно на складе");
                return back();
            }
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        session(['basket_count' => $order->products()->count()]);

        Order::changeFullSum($product->price);

        session()->flash('success', "Товар ' {$product->name} ' добавлен");
        return back();
    }

    public function basketRemove($productId)
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
        session(['basket_count' => $order->products()->count()]);

        $product = Product::find($productId);

        Order::changeFullSum(-$product->price);

        session()->flash('warning', "Товар ' {$product->name} ' удалён");

        return redirect()->route('basket');
    }
}
