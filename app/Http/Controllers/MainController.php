<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate(6)->withPath('?' . $request->getQueryString());
        return view('index', ['products' => $products]);
    }
    public function categories()
    {
        $categories = Category::get();
        return view('categories', ['categories' => $categories]);
    }
    public function category($code)
    {
        $category = Category::where('code', $code)->firstOrFail();
        return view('category', ['category' => $category]);
    }
    public function product($categoryCode,  $productCode)
    {
        $product = Product::byCode($productCode)->firstOrFail();
        return view('product', ['product' => $product]);
    }

    public function subscribe($productId)
    {
        $user = Auth::user();
        $user->products()->attach($productId);
        return redirect()->back()->with('success', 'Подписка оформлена');
    }

    public function unsubscribe($productId)
    {
        $user = Auth::user();
        $user->products()->detach($productId);
        return redirect()->back()->with('success', 'Вы отписались');
    }

    public function subscribes()
    {
        $products = Auth::user()->products()->paginate(6);
        return view('subscribes', ['products' => $products]);
    }
}
