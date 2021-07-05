{{__('mail.subscription.greeting')}} {{$user->name}}.
Товар {{$product->name}} появился на складе.
<a href="{{route('product', [$product->category->code, $product->code])}}">Перейти.</a>