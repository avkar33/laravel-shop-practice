@extends('layouts.master')

@section('title', 'Корзина')

@section('content')
    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                @isset($order)

                    @foreach ($order->products()->with('category')->get() as $product)
                        <tr>
                            <td>
                                <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                    <img height="56px" src="{{Storage::url($product->image)}}">
                                    {{ $product->__('name') }}
                                </a>
                            </td>

                            <td><span class="badge">{{ $product->pivot->count }}</span>
                                <div class="btn-group form-inline">
                                    <form action="{{ route('basket-remove', $product) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" role="button"><span
                                                class="glyphicon glyphicon-minus"></span></button>
                                    </form>
                                    <form action="{{ route('basket-add', $product) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success" role="button"><span
                                                class="glyphicon glyphicon-plus"></span></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $product->price }} руб.</td>
                            <td>{{ $product->getPriceForCount() }} руб.</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{ $order->getFullSum() }} руб.</td>
                    </tr>
                @endisset
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket-order') }}">Оформить заказ</a>
        </div>
    </div>
@endsection
