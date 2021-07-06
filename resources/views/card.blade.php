<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
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
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->__('name') }}">
        <div class="caption">

            <h3>{{ $product->__('name') }}</h3>

            <p>{{ $product->price }} руб.</p>

            <div>
                <h4>{{ $product->category->__('name') }}</h4>
                <hr>
                <div class="row justify-content-start">
                    <div class="col-sm-6">
                        @if ($product->isAvailable())
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" role="button">Добавить в корзину</button>
                            </form>

                        @else
                            <div class="alert-danger">Товар не доступен.</div>
                        @endif
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                            class="btn btn-default" role="button">Подробнее</a>
                    </div>
                    <div class="col-sm-6">
                        @if (Auth::user() && Auth::user()->products()->find($product->id))
                            <span class="btn-success">Вы подписаны</span>
                            <form method="POST" action="{{ route('unsubscribe', $product->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger" role="button">Отписаться</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('subscription', $product->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success" role="button">В желаемое</button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
