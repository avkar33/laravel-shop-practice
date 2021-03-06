@extends('layouts.master')

@section('title', 'Оформить заказ')

@section('content')
    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость: <b>{{ $order->calculateFullSum() }} ₽.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                @csrf
                <div>
                    <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                    <div class="container">
                        <div class="form-group">
                            @include('auth.layouts.error', ['fieldName' =>'name'])
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона:
                            </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            @include('auth.layouts.error', ['fieldName' =>'email'])
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Email: </label>
                            <div class="col-lg-4">
                                <input type="text" name="email" id="email"
                                    value="{{ Auth::check() ? Auth::user()->email : '' }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Подтвердите заказ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
