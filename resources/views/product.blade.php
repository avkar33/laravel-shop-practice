@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <div class="labels">
        @if ($product->isNew())
            <span class="badge badge-success">Новинка</span>
        @endif
        @if ($product->isRecommend())
            <span class="badge badge-warning">Рекомендуемые</span>

        @endif
        @if ($product->isHit())
            <span class="badge badge-danger">Хит</span>

        @endif
    </div>
    <h1>{{ $product->name }}</h1>
    <p>Цена: <b>{{ $product->price }} ₽</b></p>
    <img src="{{ Storage::url($product->image) }}">
    <p>{{ $product->description }}</p>

    <form action="{{ route('basket-add', $product) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
    </form>
@endsection
