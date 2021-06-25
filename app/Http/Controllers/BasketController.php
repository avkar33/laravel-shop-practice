<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Basket;
use App\Http\Requests\BasketConfirmRequest;

class BasketController extends Controller
{

    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', ['order' => $order]);
    }

    public function basketOrder()
    {
        $order = (new Basket())->getOrder();
        return view('order', ['order' => $order]);
    }

    public function basketConfirm(BasketConfirmRequest $request)
    {
        (new Basket())->confirmOrder($request->name, $request->phone, $request->email);
        return redirect()->route('index');
    }

    public function basketAdd($productId)
    {
        $basket = new Basket(true);
        $basket->addProduct($productId);
        return back();
    }

    public function basketRemove($productId)
    {
        $basket = new Basket();
        $basket->removeProduct($productId);
        return redirect()->route('basket');
    }
}
