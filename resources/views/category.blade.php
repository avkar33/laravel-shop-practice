@extends('layouts.master')

@section('title', $category->name ?? '')

@section('content')
    <h1>
        {{ $category->name }} {{ $category->products->count() }}
    </h1>
    <p>
        {{ $category->description }}
    </p>
    <div class="row">
        @foreach ($category->products()->with('category')->get() as $product)
            @include('card', ['product' => $product])
        @endforeach

    @endsection
