<?php

namespace App\Http\Controllers\Person;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PersonOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->get();
        return view('auth.order.person.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        return view('auth.order.person.show', ['order' => $order]);
    }
}
