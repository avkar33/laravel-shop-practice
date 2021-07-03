@extends('layouts.master')
@section('title', 'Подписки')
@section('content')
    <h1>Подписки</h1>
    <div class="row">
        @foreach ($products as $product)
            @include('card', ['product' => $product])
        @endforeach
    </div>
    {{$products->links()}}
@endsection
