<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $productsQuery = Product::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->where($field, 1);
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
    public function product($category, Product $product)
    {
        return view('product', ['product' => $product]);
    }
}
