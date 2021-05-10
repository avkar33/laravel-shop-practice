@extends('layouts.master')

@section('title', $category->name ?? '')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>
                {{ $category->name }} {{$category->products->count()}}
            </h1>
            <p>
                {{ $category->description }}
            </p>
            <div class="row">
                @foreach ($category->products as $product)
                    @include('card', ['product' => $product])
                @endforeach
            </div>
        </div>

    @endsection
