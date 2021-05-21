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
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
        <div class="caption">

            <h3>{{ $product->name }}</h3>

            <p>{{ $product->price }} руб.</p>

            <div>
                <h4>{{ $product->category->name }}</h4>
                <hr>
                <div class="row justify-content-start">
                    <div class="col-sm-6">
                        <form action="{{ route('basket-add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('product', [$product->category, $product]) }}" class="btn btn-default"
                            role="button">Подробнее</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
