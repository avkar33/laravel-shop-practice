<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{
    protected $order;

    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');

        if ($createOrder && is_null($orderId)) {
            $this->order = Order::create();
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($orderId);
        }
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function confirmOrder($name, $phone)
    {
        $userId = Auth::id() ?? 0;

        $success = $this->order->saveOrder($name, $phone, $userId);
        if ($success) {
            session()->flash('success', 'Заказ оформлен');
        } else {
            session()->flash('warning', 'Ошибка');
        }
        foreach ($this->order->products as $product) {
            if ($product->pivot->count > $product->count) {
                session()->flash('warning', "Товара ' {$product->name} ' не достаточно на складе");
                return redirect()->route('basket');
            }
            $product->reduceCount($product->pivot->count);
        }
        Order::eraseOrderSum();
        session(['basket_count' => 0]);
    }

    protected function getPivot($productId)
    {

        return $this->order->products()->where('product_id', $productId)->first()->pivot;
    }

    public function removeProduct($productId)
    {
        if ($this->order->products->contains($productId)) {
            $pivotRow = $this->getPivot($productId);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($productId);
            }
            $pivotRow->count--;
            $pivotRow->update();
        }

        session(['basket_count' => $this->order->products()->count()]);

        $product = Product::find($productId);

        Order::changeFullSum(-$product->price);

        session()->flash('warning', "Товар ' {$product->name} ' удалён");
    }

    public function addProduct($productId)
    {
        $product = Product::find($productId);
        if ($this->order->products->contains($productId)) {
            $pivotRow = $this->getPivot($productId);
            if ($pivotRow->count + 1 > $product->count) {
                session()->flash('warning', "Товара ' {$product->name} ' не достаточно на складе");
                return back();
            }
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $this->order->products()->attach($productId);
        }

        session(['basket_count' => $this->order->products()->count()]);

        Order::changeFullSum($product->price);

        session()->flash('success', "Товар ' {$product->name} ' добавлен");
    }
}
