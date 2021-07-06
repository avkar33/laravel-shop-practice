@extends('layouts.master')

@section('title', $category->__('name') ?? '')

@section('content')
    <h1>
        {{ $category->__('name') }} {{ $category->products->count() }}
    </h1>
    <p>
        {{ $category->__('description') }}
    </p>
    <div class="row">
        @foreach ($category->products()->with('category')->get() as $product)
            @include('card', ['product' => $product])
        @endforeach

    @endsection
