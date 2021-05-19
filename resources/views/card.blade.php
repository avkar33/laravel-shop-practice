<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
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
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                            class="btn btn-default" role="button">Подробнее</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
